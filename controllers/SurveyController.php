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
                'only' => ['index', 'view', 'create', 'create-with', 'create-without', 'thanks', 'export'],
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'view',
                            'create',
                            'create-with',
                            'create-without',
                            'thanks',
                            'export'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
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

    public function actionDownload($person_id, $question_id, $question_option_id)
    {
        $model = \app\models\PersonAnswerSurveyQuestionOption::findOne([
            'person_id' => $person_id,
            'question_id' => $question_id,
            'question_option_id' => $question_option_id
        ]);
        
        $decoded = base64_decode($model->option_answer);
        $file = Yii::t('app', 'anexo-'.$question_option_id.'_'.$person_id).'.pdf';
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
    
    /**
     * Displays a single Survey model.
     * @param integer $person_id
     * @return mixed
     */
    public function actionView($person_id)
    {
        $personAnswerSurveyQuestionModel = \app\models\PersonAnswerSurveyQuestion::findOne([
            'person_id' => $person_id,
        ]);
        
        if($personAnswerSurveyQuestionModel)
        {
            if($personAnswerSurveyQuestionModel->survey_id == 2)
            {
                $modelsQuestion = [];
                $modelsQuestionOption = [];
                $modelsAnswer = [];
                $modelsAnswerOption = [];

                for($i=4; $i<=47; $i++)
                {
                    $modelsQuestion[$i] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 2]);
                    $modelsQuestionOption[$i] = \app\models\QuestionOption::findAll(['question_id' => $i]);
                    $modelsAnswer[$i] = \app\models\PersonAnswerSurveyQuestion::findOne([
                        'survey_id' => 2,
                        'person_id' => $person_id,
                        'question_id' => $modelsQuestion[$i]->question_id
                    ]);

                    foreach($modelsQuestionOption[$i] as $index => $op)
                    {
                        $modelsAnswerOption[$i][] = \app\models\PersonAnswerSurveyQuestionOption::findOne([
                            'person_id' => $person_id,
                            'question_id' => $modelsQuestion[$i]->question_id,
                            'question_option_id' => $modelsQuestionOption[$i][$index]->question_option_id,  
                        ]);
                    }
                }
            }
            else
            {
                $modelsQuestion = [];
                $modelsQuestionOption = [];
                $modelsAnswer = [];
                $modelsAnswerOption = [];

                for($i=1; $i<4; $i++)
                {
                    $modelsQuestion[$i] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 1]);
                    $modelsAnswer[$i] = \app\models\PersonAnswerSurveyQuestion::findOne([
                        'survey_id' => 1,
                        'person_id' => $person_id,
                        'question_id' => $modelsQuestion[$i]->question_id
                    ]);
                }
            }
            return $this->render('view', [
                'modelPerson' => \app\models\Person::findOne($person_id),
                'modelsQuestion' => $modelsQuestion,
                'modelsQuestionOption' => $modelsQuestionOption,
                'modelsAnswer' => $modelsAnswer,
                'modelsAnswerOption' => $modelsAnswerOption,
            ]);
        }
        else
        {
            return $this->redirect(['index']);
        }
    }

    /**
     * The purpose of this function is to render a view for user choose survey type.
     * @return mixed
     */
    public function actionCreate($person_id)
    {
        $personModel = \app\models\Person::findOne($person_id);
        if($personModel && $personModel->survey_success)
        {
            return $this->render('thanks');
        }
        else
        {
            return $this->render('pre-create', ['person_id' => $person_id]);
        }
    }
    
    /**
     * Creates a new Survey.
     * If creation is successful, the browser will be redirected to the respective 'create' page.
     * @return mixed
     */
    public function actionCreateWith($person_id)
    {
        $model = Survey::findOne(2);
        $modelPerson = \app\models\Person::findOne($person_id);
        
        if($modelPerson->survey_success)
        {
            return $this->render('thanks');
        }
        else
        {
            $startedButNotFinished = false;
            if(\app\models\PersonAnswerSurveyQuestion::findOne(['person_id' => $person_id, 'question_id'=> 20, 'survey_id' => 2]))
            {
                $startedButNotFinished = true;
            }

            $modelsQuestion = [];
            $modelsQuestionOption = [];
            $modelsAnswer = [];
            $modelsAnswerOption = [];
            
            if(!$startedButNotFinished)
            {
                for($i=4; $i<21; $i++)
                {
                    $modelsQuestion[$i] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 2]);
                    $modelsQuestionOption[$i] = \app\models\QuestionOption::findAll(['question_id' => $i]);
                    $modelsAnswer[$i] = new \app\models\PersonAnswerSurveyQuestion;
                    $modelsAnswerOption[$i][] = new \app\models\PersonAnswerSurveyQuestionOption;
                }
            }
            else{
                for($i=21; $i<=47; $i++)
                {
                    $modelsQuestion[$i] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 2]);
                    $modelsQuestionOption[$i] = \app\models\QuestionOption::findAll(['question_id' => $i]);
                    $modelsAnswer[$i] = new \app\models\PersonAnswerSurveyQuestion;
                    
                    foreach($modelsQuestionOption[$i] as $index => $op)
                    {
                        $modelsAnswerOption[$i][] = new \app\models\PersonAnswerSurveyQuestionOption;
                    }
                    
                }
            }

            if ( $model->load(Yii::$app->request->post()) &&
                ($modelsAnswer = Yii::$app->request->post('PersonAnswerSurveyQuestion')) &&
                ($modelsAnswerOption = Yii::$app->request->post('PersonAnswerSurveyQuestionOption'))
            )
            {
                $transaction = Yii::$app->db->beginTransaction();
                
                try 
                {
                    $condition2Commit = true;
                    foreach($modelsAnswer as $index => $a)
                    {
                        $modelAnswer = new \app\models\PersonAnswerSurveyQuestion;
                        $modelAnswer->survey_id = $model->survey_id;
                        $modelAnswer->person_id = $person_id;
                        $modelAnswer->question_id = $modelsQuestion[$index]->question_id;

                        if(is_array($a['answer']))
                        {
                            $auxAnswerOptions = '';
                            foreach($a['answer'] as $tmp)
                            {
                                $auxAnswerOptions = $auxAnswerOptions.';'.$tmp;
                            }
                            $modelAnswer->answer = substr($auxAnswerOptions, 1);
                        }
                        else
                        {
                            $modelAnswer->answer = $a['answer'];
                        }
                        
                        if(($condition2Commit = $modelAnswer->save()))
                        {
                            if(array_key_exists($index, $modelsAnswerOption))
                            {
                                foreach($modelsAnswerOption[$index] as $index2 => $o)
                                {
                                    $modelAnswerOption = new \app\models\PersonAnswerSurveyQuestionOption;
                                    $modelAnswerOption->person_id = $person_id;
                                    $modelAnswerOption->question_id = $modelsQuestion[$index]->question_id;
                                    $modelAnswerOption->question_option_id = $modelsQuestionOption[$index][$index2]->question_option_id;
                                    
                                    if($modelsQuestionOption[$index][$index2]->element_type == 'file')
                                    {
                                        $configArray = [
                                            'name' => $_FILES['PersonAnswerSurveyQuestionOption']['name'][$index][$index2]['option_answer'],
                                            'type' => $_FILES['PersonAnswerSurveyQuestionOption']['type'][$index][$index2]['option_answer'],
                                            'tmp_name' => $_FILES['PersonAnswerSurveyQuestionOption']['tmp_name'][$index][$index2]['option_answer'],
                                            'error' => $_FILES['PersonAnswerSurveyQuestionOption']['error'][$index][$index2]['option_answer'],
                                            'size' => $_FILES['PersonAnswerSurveyQuestionOption']['size'][$index][$index2]['option_answer']
                                        ];
                                        
                                        if(move_uploaded_file($configArray['tmp_name'], '/tmp/' . $configArray['name']))
                                        {
                                            $modelAnswerOption->option_answer = base64_encode(file_get_contents('/tmp/'.$configArray['name']));
                                        }
                                    }
                                    else
                                    {
                                        if(is_array($o['option_answer']))
                                        {
                                            $auxAnswerOptions = '';
                                            foreach($o['option_answer'] as $tmp)
                                            {
                                                $auxAnswerOptions = $auxAnswerOptions.';'.$tmp;
                                            }
                                            $modelAnswerOption->option_answer = substr($auxAnswerOptions, 1);
                                        }
                                        else
                                        {   
                                            $modelAnswerOption->option_answer = $o['option_answer'];
                                        }
                                    }
                                    
                                    
                                    if(! ($condition2Commit = $modelAnswerOption->save()))
                                    {
                                        break;
                                    }
                                }
                            }
                        }
                        else
                        {
                            break;
                        }
                    }

                    if($condition2Commit)
                    {
                        $modelPerson->survey_success = $startedButNotFinished ? true : false;
                        $modelPerson->survey_success_at = $startedButNotFinished ? date('Y-m-d H:i:s') : null;
                        if($modelPerson->save())
                        {
                            $transaction->commit();

                            if(! $modelPerson->survey_success)
                            {
                                return $this->redirect(['create-with', 'person_id' => $person_id]);
                            }
                            else
                            {
                                if($model->sendMail($modelPerson->users[0]->email))
                                {
                                    return $this->redirect(['thanks']);
                                }

                            }
                        }
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();
                }
            }

            return $this->render('_survey-with', [
                'model' => $model,
                'modelPerson' => $modelPerson,
                'modelsQuestion' => $modelsQuestion,
                'modelsQuestionOption' => $modelsQuestionOption,
                'modelsAnswer' => $modelsAnswer,
                'modelsAnswerOption' => $modelsAnswerOption,
                'startedButNotFinished' => $startedButNotFinished
            ]);
        }
    }
    
    /**
     * Creates a new Survey.
     * If creation is successful, the browser will be redirected to the respective 'create' page.
     * @return mixed
     */
    public function actionCreateWithout($person_id)
    {
        $model = Survey::findOne(1);
        $modelPerson = \app\models\Person::findOne($person_id);
        
        if(! $modelPerson->survey_success)
        {
            $questionGroup = [];
            $answerGroup = [];
            for($i=1; $i<=3; $i++) 
            {
                $questionGroup[] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 1]);
                $answerGroup[] = new \app\models\PersonAnswerSurveyQuestion;
            }

            if ($model->load(Yii::$app->request->post()) && 
                ($answerGroup = Yii::$app->request->post('PersonAnswerSurveyQuestion'))
            )
            {
                $transaction = Yii::$app->db->beginTransaction();

                try 
                {
                    $condition2Commit = true;
                    foreach($answerGroup as $index => $a)
                    {
                        $modelAnswer = new \app\models\PersonAnswerSurveyQuestion;
                        $modelAnswer->survey_id = $model->survey_id;
                        $modelAnswer->person_id = $person_id;
                        $modelAnswer->question_id = $questionGroup[$index]->question_id;
                        $modelAnswer->answer = $a['answer'];
                        if(! ($condition2Commit = $modelAnswer->save()))
                        {
                            break;
                        }
                    }
                    
                    if($condition2Commit)
                    {
                        $modelPerson->survey_success = true;
                        $modelPerson->survey_success_at = date('Y-m-d H:i:s');
                        if($modelPerson->save())
                        {
                            if($model->sendMail($modelPerson->users[0]->email))
                            {
                                $transaction->commit();
                            }
                        }
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();
                }
            }
            
            return $this->render('_survey-without', [
                'model' => $model,
                'modelPerson' => $modelPerson,
                'questionGroup' => $questionGroup,
                'answerGroup' => $answerGroup
            ]);
        }
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
        $personAnswerSurveyQuestionModel = \app\models\PersonAnswerSurveyQuestion::findOne([
            'person_id' => $person_id,
        ]);
        
        if($personAnswerSurveyQuestionModel)
        {
            $filename = 'person-'.$person_id.'_'.Date('YmdGis').'.xls';
        
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=".$filename);
            
            if($personAnswerSurveyQuestionModel->survey_id == 2)
            {
                $modelsQuestion = [];
                $modelsQuestionOption = [];
                $modelsAnswer = [];
                $modelsAnswerOption = [];

                for($i=4; $i<47; $i++)
                {
                    $modelsQuestion[$i] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 2]);
                    $modelsQuestionOption[$i] = \app\models\QuestionOption::findAll(['question_id' => $i]);
                    $modelsAnswer[$i] = \app\models\PersonAnswerSurveyQuestion::findOne([
                        'survey_id' => 2,
                        'person_id' => $person_id,
                        'question_id' => $modelsQuestion[$i]->question_id
                    ]);

                    foreach($modelsQuestionOption[$i] as $index => $op)
                    {
                        $modelsAnswerOption[$i][] = \app\models\PersonAnswerSurveyQuestionOption::findOne([
                            'person_id' => $person_id,
                            'question_id' => $modelsQuestion[$i]->question_id,
                            'question_option_id' => $modelsQuestionOption[$i][$index]->question_option_id,  
                        ]);
                    }
                }
                
                echo '<table border="1" width="100%">
                    <thead>
                        <tr>';
                        echo "<th>Email</th>";
                        foreach($modelsQuestion as $index => $q):
                            echo "<th>".$q->label."</th>";
                            foreach($modelsQuestionOption[$index] as $index2 => $q2):
                                echo "<th>$q2->label</th>";
                            endforeach;
                        endforeach;
                        '</tr>
                    </thead>';
                    echo '<tr>';
                    echo "<td>".\app\models\Person::findOne($person_id)->users[0]->email."</td>";
                    foreach($modelsQuestion as $index => $q):
                        if($q->element_type == 'select'):
                            echo $modelsAnswer[$index] ? "<td>".explode(';', $q->options)[$modelsAnswer[$index]->answer]."</td>" : '<td></td>';
                        elseif($q->element_type == 'checkbox' || $q->element_type == 'radio'):
                            echo "<td>";
                            foreach(explode(';', $modelsAnswer[$index]->answer) as $exp):
                                echo explode(';', $q->options)[$exp]."; ";
                            endforeach;
                            echo "</td>";
                        else:
                            echo $modelsAnswer[$index] ? "<td>".$modelsAnswer[$index]->answer."</td>" : "<td></td>";
                        endif;

                        foreach($modelsQuestionOption[$index] as $index2 => $q2):
                            if($modelsAnswerOption[$index][$index2]):
                                if($q2->element_type == 'select'):
                                    if($modelsAnswerOption[$index][$index2]->option_answer != ''):
                                        echo "<td>".explode(';', $q2->options)[$modelsAnswerOption[$index][$index2]->option_answer]."</td>";
                                    else:
                                        echo "<td>".$modelsAnswerOption[$index][$index2]->option_answer."</td>";
                                    endif;
                                elseif($q2->element_type == 'file'):
                                    echo "<td></td>";
                                else:
                                    echo "<td>".$modelsAnswerOption[$index][$index2]->option_answer."</td>";
                                endif;
                            else:
                                echo "<td></td>";
                            endif;
                        endforeach;
                    endforeach;
                    '</tr>';
                echo '</table>';
            }
            else
            {
                $modelsQuestion = [];
                $modelsAnswer = [];
                $modelsAnswerOption = [];

                for($i=1; $i<4; $i++)
                {
                    $modelsQuestion[$i] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 1]);
                    $modelsAnswer[$i] = \app\models\PersonAnswerSurveyQuestion::findOne([
                        'survey_id' => 1,
                        'person_id' => $person_id,
                        'question_id' => $modelsQuestion[$i]->question_id
                    ]);
                }
                
                echo '<table border="1" width="100%">
                <thead>
                    <tr>';
                    echo "<th>Email</th>";
                    foreach($modelsQuestion as $index => $q):
                        echo "<th>$q->label</th>";
                    endforeach;
                    '</tr>
                </thead>';
                echo '<tr>';
                echo "<td>".\app\models\Person::findOne($person_id)->users[0]->email."</td>";
                foreach($modelsQuestion as $index => $q):
                    if($q->element_type == 'select'):
                        echo $modelsAnswer[$index] ? "<td>".explode(';', $q->options)[$modelsAnswer[$index]->answer]."</td>" : '<td></td>';
                    elseif($q->element_type == 'checkbox' || $q->element_type == 'radio'):
                        echo "<td>";
                        foreach(explode(';', $modelsAnswer[$index]->answer) as $exp):
                            echo explode(';', $q->options)[$exp]."; ";
                        endforeach;
                        echo "</td>";
                    else:
                        echo $modelsAnswer[$index] ? "<td>".$modelsAnswer[$index]->answer."</td>" : "<td></td>";
                    endif;
                endforeach;
                '</tr>';
            echo '</table>';
            }
        }
    }
}
