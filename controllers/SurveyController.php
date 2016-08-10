<?php

namespace app\controllers;

use Yii;
use app\models\Survey;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * SurveyController implements the CRUD actions for Survey model.
 */
class SurveyController extends Controller
{
    public $layout = 'survey';
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'pre-create', 'create', 'download', 'thanks', 'export'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'download', 'export'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action) {
                                $user = Yii::$app->user->identity;
                                return ($user->type == 'Pesquisador');
                        }
                    ],
                    [
                        'actions' => ['pre-create', 'create', 'thanks'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action) {
                                $user = Yii::$app->user->identity;
                                return ($user->type == 'Entrevistado');
                        }
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Lists all Survey models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'grid-layout';
        
        $searchModel = new \app\models\PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDownload($person_id, $question)
    {
        $ans = \app\models\PersonHasSurveyAnswer::findOne(['person_id' => $person_id, 'question' => $question]);
        
        if($ans) {
            $decoded = base64_decode($ans->answer);
            $file = Yii::t('app', 'anexo-'.$question.'_'.$person_id).'.pdf';
            file_put_contents($file, $decoded);

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }
    
    /**
     * Displays a single Survey model.
     * @param integer $person_id
     * @return mixed
     */
    public function actionView($person_id)
    {   
        return $this->render('view', [
            'person_id' => $person_id
        ]);
    }

    /**
     * Creates a new Survey model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPreCreate($person_id)
    {
        if (\app\models\Person::findOne($person_id)->survey_success) {
            return $this->redirect('thanks');
        }
        
        return $this->render('pre-create', [
            'model' => $model = new Survey,
            'person_id' => $person_id
        ]);
    }
    
    /**
     * 
     * @param type $survey_type
     * @param type $person_id
     * @return type
     */
    public function actionCreate($survey_type, $person_id)
    {   
        return $this->render('_survey-container', [
            'survey_type' => $survey_type,
            'person_id' => $person_id
        ]);
    }
    
    /**
     * 
     * @param type $survey_type
     * @param type $question_form_group
     * @param type $person_id
     * @return string
     */
    public function actionRenderFormGroup($survey_type, $question_form_group, $person_id)
    {        
        if(!empty(Yii::$app->request->post()))
            $question_form_group = Yii::$app->request->post(array_keys(Yii::$app->request->post())[1])['page'];
        
        $questionGroupModel = $this->getLastQuestionGroupAnswered($question_form_group, $survey_type, $person_id);
        
        if (!$questionGroupModel) return $this->renderAjax('thanks');
        
        if($questionGroupModel->load(Yii::$app->request->post())) {   
            $transaction = Yii::$app->db->beginTransaction();
            
            try {
                foreach($questionGroupModel->attributes as $index => $attribute) {
                    if(!($index === 'page') && !(strpos('options', $index) !== false)) {
                        $personHasSurveyAnswerModel = new \app\models\PersonHasSurveyAnswer;
                        $personHasSurveyAnswerModel->person_id = $person_id;
                        $personHasSurveyAnswerModel->survey_id = $survey_type == 'with' ? 2 : 1;
                        $personHasSurveyAnswerModel->question = $index;
                        
                        if($index == 'q42_file' || $index == 'q43_file') {
                            $questionGroupModel->$index = \yii\web\UploadedFile::getInstance($questionGroupModel, $index);
                            if($questionGroupModel->$index) {
                                $questionGroupModel->$index->saveAs($questionGroupModel->$index->baseName . '.' . $questionGroupModel->$index->extension);
                                $personHasSurveyAnswerModel->answer = base64_encode(file_get_contents($questionGroupModel->$index->baseName . '.' . $questionGroupModel->$index->extension));
                            }
                        } else {
                            $personHasSurveyAnswerModel->answer = $this->getAnswer($attribute);
                        }
                        
                        $personHasSurveyAnswerModel->save();
                    }
                }

                if (($survey_type == 'without' && $question_form_group == 1) || ($survey_type == 'with' && $question_form_group == 16)) {
                    $modelPerson = \app\models\Person::findOne ($person_id);
                    $modelPerson->survey_success = true;
                    $modelPerson->survey_success_at = date('Y-m-d H:i:s');
                    $modelPerson->save();
                    $survey_id = $survey_type == 'with' ? 2 : 1;
                    $model = Survey::findOne($survey_id);
                    $model->sendMail($modelPerson->users[0]->email);
                    
                    $transaction->commit();
                    return $this->renderAjax('thanks');
                }

                $transaction->commit();
                
                $questionFormGroupClass = "\app\models\\".$survey_type."\\FormGroup".($questionGroupModel->page + 1);
                $questionGroupModel = new $questionFormGroupClass;
                if($questionGroupModel) {
                    return $this->renderAjax($survey_type.'/_form-group-'.$questionGroupModel->page, [
                        'questionGroupModel' => new $questionFormGroupClass,
                    ]);
                }
            } catch (Exception $ex) {
                $transaction->rollBack();
            }
        }
        
        return $this->renderAjax($survey_type.'/_form-group-'.$questionGroupModel->page, [
            'questionGroupModel' => $questionGroupModel,
            'person_id' => $person_id
        ]);
    }

    /**
     * The purpose of this function is to redirect user to thanks views.
     * This happens whenever a user to complete a search.
     * @return mixed
     */
    public function actionThanks()
    {
        $this->layout = 'survey';
        return $this->render('thanks');
    }

    /**
     * Finds the Survey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Survey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Survey::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionExport($person_id)
    {
        $questions1 = [
            'q1' => '1. A disciplina ou conteúdo de História da Enfermagem já foi oferecido em períodos anteriores?',
            'q1_options' => 'Não;Sim, o conteúdo era ministrado em Disciplina própria;Sim, o conteúdo era ministrado em Disciplina integrada a outros temas',
            'q2' => '2. Em que ano a disciplina ou conteúdo de História da Enfermagem deixou de ser oferecida como disciplina específica ou associada?',
            'q3' => '3. Qual o motivo para a remoção da disciplina?',
        ];
        
        $questions2 = [
            'q1' => '1. Qual a sua instituição?',
            'q1_extra' => '1.1. Ano de contratação',
            'q2' => '2. Nome e código da disciplina',
            'q3' => '3. O conteúdo de História da Enfermagem:',
            'q3_options' => 'É oferecido em disciplina própria;É oferecido em disciplina integrada com outros conteúdos',
            'q4' => '4. Departamento ou setor responsável pelo conteúdo ou disciplina de História da Enfermagem:',
            'q5' => '5. Ano de oferecimento conteúdo ou disciplina de História da Enfermagem no curso de graduação:',
            'q5_extra1' => '5.2 a) Modalidade de oferecimento da disciplina onde está inserido o conteúdo de História da Enfermagem no curso de graduação:',
            'q5_extra2' => '5.2 b) Natureza / Tipo da disciplina onde está inserido o conteúdo de História da Enfermagem no curso de graduação:',
            'q5_options' => '1º Ano;2º Ano;3º Ano;4º Ano;5º Ano',
            'q5_extra' => '5.1. Período de oferecimento:',
            'q5_extra_options' => '1º Semestre;2º Semestre;Anual',
            'q6' => '6. Carga horária total da Disciplina:',
            'q7' => '7. Carga horária do conteúdo de História:',
            'q8' => '8. Como você percebe a importância do conteúdo ou da disciplina de História da Enfermagem na formação do enfermeiro?',
            'q9' => '9. Encontra dificuldades para ministrar o conteúdo ou disciplina de História da Enfermagem?',
            'q9_options' => 'Não;Sim, quais?',
            'q10' => '10. Quais estratégias metodológicas são utilizadas na disciplina?',
            'q10_options' => 'aulas expositivas;aulas expositivas dialogadas;discussão de textos;seminários;encenação teatral;viagem didática;análise de documentos;outras',
            'q11' => '11. Quais os métodos de avaliação do aluno?',
            'q11_options' => 'participação em sala de aula;frequência;trabalhos individuais escritos;trabalhos em grupo escritos;apresentação de seminários;prova escrita;estudo dirigido;exercícios em sala de aula;outros',
            'q12' => '12. Qual a bibliografia utilizada na disciplina? Favor colar as referências utilizadas nesse espaço.',
            'q13' => '13. De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a importância do conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?',
            'q14' => '14. De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a valorização dos estudantes para o conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?',
            'q15' => '15. De 0 a 10, sendo 0, nenhuma importância e 10 muita importância, como você classifica a valorização que a sua instituição atribui ao conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?',
            'q16' => '16. De 0 a 10, sendo 0, nenhum e 10 excelente, como você classifica seu domínio dos conhecimentos para ministrar o conteúdo ou disciplina de História da Enfermagem?',
            'q17' => '17. Como geralmente se dá a escolha do docente desse conteúdo ou disciplina de História da Enfermagem na sua instituição? Quais os critérios?',
            'q17_options' => 'Currículo específico;Concurso específico para a disciplina;Processo Seletivo específico para a disciplina;Afinidade com o tema;Professor contratado com menor carga horária;Disponibilidade;Outros',
            'q18' => '1. Gênero:',
            'q18_options' => 'Masculino;Feminino',
            'q19' => '2. Idade:',
            'q20' => '3. Qual sua formação inicial?',
            'q20_options' => 'Bacharel em Enfermagem;Bacharel e Licenciado em Enfermagem; Bacharel ou Licencitura em História;Outro',
            'q20_extra2' => '3.1. Ano de conclusão:',
            'q21' => '4. Possui outro curso de graduação?',
            'q21_options' => 'Não;Sim',
            'q21_extra2' => '4.1. Ano de conclusão:',
            'q22' => '5. Possui curso de especialização?',
            'q22_options' => 'Não;Sim',
            'q22_extra2' => '5.1. Ano de conclusão:',
            'q23' => '6. Possui Pós-graduação Stricto Sensu?',
            'q23_options' => 'Mestrado;Doutorado;Pós-Doutorado',
            'q23_extra' => '6.2. Ano de conclusão:',
            'q23_extra_sit' => '6.1. Andamento:',
            'q23_extra_sit_options' => 'Em andamento;Concluído',
            'q23_extra2' => '6.2. Ano de conclusão:',
            'q23_extra2_sit' => '6.1. Andamento:',
            'q23_extra2_sit_options' => 'Em andamento;Concluído',
            'q23_extra3' => '6.2. Ano de conclusão:',
            'q23_extra3_sit' => '6.1. Andamento:',
            'q23_extra3_sit_options' => 'Em andamento;Concluído',
            'q24' => '7. Há quanto tempo é responsável pela disciplina ou conteúdo de História da Enfermagem?',
            'q24_options' => 'Menos de 1 ano;De 1 à 3 anos;De 4 à 6 anos;De 7 à 9 anos;Mais de 10 anos',
            'q25' => '8. Qual a sua carga horária semanal média nessa instituição de ensino?',
            'q26' => '9. Possui outro vinculo empregatício?',
            'q26_options' => 'Não;Sim',
            'q27' => '10. Idiomas',
            'q27_extra1' => 'Ingles: ',
            'q27_extra2' => 'Espanhol: ',
            'q27_extra3' => 'Outros',
            'q27_extra_options' => 'Sem conhecimento;Básico ou Regular;Avançado;Fluente',
            'q28' => '11. Você é responsável por outras disciplinas?',
            'q28_options' => 'Não;Sim',
            'q28_qt' => 'Quantas?',
            'q28_extra' => 'Nome da disciplina',
            'q28_extra1' => 'Carga horária',
            'q28_extra2' => 'Área',
            'q28_extra3' => 'Nome da disciplina',
            'q28_extra4' => 'Carga horária',
            'q28_extra5' => 'Área',
            'q28_extra6' => 'Nome da disciplina',
            'q28_extra7' => 'Carga horária',
            'q28_extra8' => 'Área',
            'q28_extra9' => 'Outras? Quais?',
            'q28_extra_options' => 'Enfermagem Médico-Cirúrgica; Enfermagem Obstétrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública;Outra',
            'q29' => '12. Participa de algum grupo de pesquisa?',
            'q29_options' => 'Não;Sim',
            'q29_options_1' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública',
            'q29_options_2' => 'Paritipante;Líder;Vice-Líder',
            'q29_extra' => 'Área',
            'q29_extra1' => 'Função',
            'q29_extra2' => 'Área',
            'q29_extra3' => 'Função',
            'q29_extra4' => 'Área',
            'q29_extra5' => 'Função',
            'q29_extra6' => 'Área',
            'q29_extra7' => 'Função',
            'q29_extra8' => 'Área',
            'q29_extra9' => 'Função',
            'q29_extra8' => 'Outros? Quais?',
            'q30' => '13. Atua em alguma linha ou linhas de pesquisa?',
            'q30_options' => 'Não;Sim',
            'q30_extra' => 'Linha de pesquisa',
            'q30_extra1' => 'Linha de pesquisa',
            'q30_extra2' => 'Linha de pesquisa',
            'q30_extra3' => 'Linha de pesquisa',
            'q30_extra4' => 'Linha de pesquisa',
            'q31' => '14. Participa de projetos de pesquisa?',
            'q31_options' => 'Não;Sim',
            'q31_options_1' => '1;2;3;4;5;6;7;8;9;10; Mais de 10',
            'q31_extra' => 'Área',
            'q31_extra1' => 'Quantidade de projetos em andamento',
            'q31_extra2' => 'Quantidade de projetos concluídos',
            'q31_extra3' => 'Área',
            'q31_extra4' => 'Quantidade de projetos em andamento',
            'q31_extra5' => 'Quantidade de projetos concluídos',
            'q31_extra6' => 'Área',
            'q31_extra7' => 'Quantidade de projetos em andamento',
            'q31_extra8' => 'Quantidade de projetos concluídos',
            'q31_extra9' => 'Área',
            'q31_extra10' => 'Quantidade de projetos em andamento',
            'q31_extra11' => 'Quantidade de projetos concluídos',
            'q32_extra' => 'Área',
            'q32_extra1' => 'Quantidade de projetos em andamento',
            'q32_extra2' => 'Quantidade de projetos concluídos',
            'q32_extra3' => 'Área',
            'q32_extra4' => 'Quantidade de projetos em andamento',
            'q32_extra5' => 'Quantidade de projetos concluídos',
            'q32_extra6' => 'Área',
            'q32_extra7' => 'Quantidade de projetos em andamento',
            'q32_extra8' => 'Quantidade de projetos concluídos',
            'q32_extra9' => 'Área',
            'q32_extra10' => 'Quantidade de projetos em andamento',
            'q32_extra11' => 'Quantidade de projetos concluídos',
            'q32' => '15. Atua em algum projeto de extensão?',
            'q32_options' => 'Não;Sim',
            'q33' => '16. Produziu artigos completos publicados em periódicos na área de História da Enfermagem?',
            'q33_extra' => 'Revista',
            'q33_extra1' => 'Quantidade',
            'q33_extra2' => 'Revista',
            'q33_extra3' => 'Quantidade',
            'q33_extra4' => 'Revista',
            'q33_extra5' => 'Quantidade',
            'q34_extra' => 'Área',
            'q34_extra1' => 'Quantidade',
            'q34_extra2' => 'Área',
            'q34_extra3' => 'Quantidade',
            'q34_extra4' => 'Área',
            'q34_extra5' => 'Quantidade',
            'q34_extra6' => 'Área',
            'q34_extra7' => 'Total de artigos',
            'q34_extra8' => 'Área',
            'q34_extra9' => 'Total de artigos',
            'q34_extra10' => 'Área',
            'q34_extra11' => 'Total de artigos',
            'q34' => '16.2 - Produziu artigos completos publicados em periódicos em outras áreas da Enfermagem?',
            'q33_options' => 'Não;Sim',
            'q33_extra_options' => 'Nenhuma;Revista Latino Americana de Enfermagem;Revista de Escola de Enfermagem da USP;Acta Paulista de Enfermagem;Revista Brasileira de Enfermagem;Revista Texto e Contexto;Revista Escola de Enfermagem Anna Nery;Revista Gaúcha de Enfermagem;Revista Reuol;Revista Mineira de Enfermagem REME;Revista Escola de Enfermagem da UERJ;História da Enfermagem - Revista Eletrônica (HERE)',
            'q34_extra_options' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública',
            'q35' => '17. Produziu livros e capítulos',
            'q35_extra_options' => '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
            'q35_extra' => 'a) Livros',
            'q35_extra1' => 'Área',
            'q35_extra2' => 'Quantidade',
            'q35_extra3' => 'Área',
            'q35_extra4' => 'Quantidade',
            'q35_extra5' => 'Área',
            'q35_extra6' => 'Quantidade',
            'q35_extra7' => 'b) Capítulos',
            'q35_extra8' => 'Área',
            'q35_extra9' => 'Quantidade',
            'q35_extra10' => 'Área',
            'q35_extra11' => 'Quantidade',
            'q35_extra12' => 'Área',
            'q35_extra13' => 'Quantidade',
            'q36' => '18. Participação em congressos ou eventos de porte nacional/regional?',
            'q36_options' => 'Não;Sim',
            'q36_extra_options1' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica; Enfermagem Obstétrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública;Outra',
            'q36_extra_options2' => '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
            'q36_extra' => 'Área',
            'q36_extra1' => 'Quantidade',
            'q36_extra2' => 'Área',
            'q36_extra3' => 'Quantidade',
            'q36_extra4' => 'Área',
            'q36_extra5' => 'Quantidade',
            'q36_extra6' => 'Área',
            'q36_extra7' => 'Quantidade',
            'q36_extra8' => 'Área',
            'q36_extra9' => 'Quantidade',
            'q37' => '19. Possui orientação de alunos de mestrado?',
            'q37_extra' => 'Área',
            'q37_extra1' => 'Quantidade em andamento',
            'q37_extra2' => 'Quantidade concluídos',
            'q37_extra3' => 'Área',
            'q37_extra4' => 'Quantidade em andamento',
            'q37_extra5' => 'Quantidade concluídos',
            'q37_extra6' => 'Área',
            'q37_extra7' => 'Quantidade em andamento',
            'q37_extra8' => 'Quantidade concluídos',
            'q37_extra9' => 'Área',
            'q38' => '20. Possui orientação em Tese de doutorado?',
            'q38_extra' => 'Área',
            'q38_extra1' => 'Quantidade em andamento',
            'q38_extra2' => 'Quantidade concluídos',
            'q38_extra3' => 'Área',
            'q38_extra4' => 'Quantidade em andamento',
            'q38_extra5' => 'Quantidade concluídos',
            'q38_extra6' => 'Área',
            'q38_extra7' => 'Quantidade em andamento',
            'q38_extra8' => 'Quantidade concluídos',
            'q38_extra9' => 'Área',
            'q39' => '21. Possui orientação em Trabalho de Conclusão de Curso ou Iniciação científica?',
            'q37_extra' => 'Área',
            'q39_extra1' => 'Quantidade em andamento',
            'q39_extra2' => 'Quantidade concluídos',
            'q39_extra3' => 'Área',
            'q39_extra4' => 'Quantidade em andamento',
            'q39_extra5' => 'Quantidade concluídos',
            'q39_extra6' => 'Área',
            'q39_extra7' => 'Quantidade em andamento',
            'q39_extra8' => 'Quantidade concluídos',
            'q39_extra9' => 'Área',
            'q37_options' => 'Não;Sim',
            'q37_extra_options1' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica; Enfermagem Obstétrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública;Outra',
            'q37_extra_options2' => '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
            'q40' => '22. O programa da disciplina de História da Enfermagem ou de seu conteúdo está de acordo com o que é ministrado em sala de aula? Ou atualizado?',
            'q41' => '23. Existe alguma atividade da disciplina de História da Enfermagem ou de seu conteúdo, que ainda não consta no programa da disciplina ou de sua bibliografia?',
            'q42' => '24. Por favor, Anexar arquivo ou colar texto do programa da disciplina de História da Enfermagem ou disciplina que trabalha o conteúdo de História da Enfermagem, ou link para site institucional com programa.',
            'q43' => '25. Por favor, Anexar arquivo ou colar texto com rede/grade curricular, do curso de Enfermagem com respectivas cargas horárias, ou link para site institucional com currículo.'
        ];
        
        $model = \app\models\PersonHasSurveyAnswer::findOne(['person_id' => $person_id]);
        
        if(! $model) return false;
        
            if ($model->survey_id == 1) {
            $questions = $questions1;
            $survey_id = 1;
        } else {
            $questions = $questions2;
            $survey_id = 2;
        }
        
        $filename = 'person-'.$person_id.'_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        
        echo '<table border="1" width="100%">
                <thead>
                    <tr>';
                    foreach($questions as $index => $q) {
                        if (!(strpos($index, 'options') !== false)  && 
                            !(strpos($index, 'file') !== false)
                        ) { 
                            echo '<th>'.$q.'</th>';
                        }
                    }
                    echo '</tr>
                </thead>
                    <tr>';
                    foreach($questions as $index => $q) {
                        if (!(strpos($index, 'options') !== false)  && 
                            !(strpos($index, 'file') !== false)
                        ) { 
                            echo '<td>';
                            $ans = \app\models\PersonHasSurveyAnswer::findOne(['person_id' => $person_id, 'question' => $index]);
                            if ($ans) echo $ans->answer;
                            else echo 'SEM REPSOSTA';
                            echo '</td>';
                        }
                    }
                    echo '</tr>
            </table>';
    }
    
    /**
     * 
     * @param type $question_form_group
     * @param type $survey_type
     * @return \app\controllers\questionFormGroupClass
     */
    public function getLastQuestionGroupAnswered($question_form_group, $survey_type, $person_id)
    {   
        if (\app\models\Person::findOne($person_id)->survey_success) return false;
        
        if (\app\models\PersonHasSurveyAnswer::findOne(['person_id' => $person_id])->survey_id == 1 && $survey_type == 'with' ||
            \app\models\PersonHasSurveyAnswer::findOne(['person_id' => $person_id])->survey_id == 2 && $survey_type == 'without') {
            \app\models\PersonHasSurveyAnswer::deleteAll(['person_id' => $person_id]);
        }
        
        while(true) {
            $questionFormGroupClass = "\app\models\\".$survey_type."\\FormGroup".$question_form_group;
            $questionGroupModel = new $questionFormGroupClass;
            
            if ($questionGroupModel) {
                foreach($questionGroupModel->attributes as $index => $attribute) {  
                    if (!($index === 'page')                    && 
                        !(strpos($index, 'options') !== false)  && 
                        !(strpos($index, 'extra') !== false)    && 
                        !(strpos($index, 'qt') !== false)       &&
                        !(strpos($index, 'file') !== false)
                    ) { 
                        $personHasSurveyAnswerModel = \app\models\PersonHasSurveyAnswer::findOne([
                            'person_id' => $person_id,
                            'survey_id' => $survey_type == 'with' ? 2 : 1,
                            'question' => $index
                        ]);

                        if (!$personHasSurveyAnswerModel) {
                            return $questionGroupModel;
                        }
                    }
                }
            } else {
                return false;
            }
            $question_form_group++;
        } 
        return false;
    }
    
    /**
     * 
     * @param type $attribute
     * @return type
     */
    public function getAnswer($attribute)
    {
        if(is_array($attribute)) {
            $answer = '';
            foreach ($attribute as $a)
                $answer .= $a.';';
        } else {
            $answer = $attribute;
        }
        return $answer;
    }
}
