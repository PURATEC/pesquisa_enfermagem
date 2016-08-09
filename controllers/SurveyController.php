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
     * Creates a new Survey model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPreCreate($person_id)
    {
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
                        $personHasSurveyAnswerModel->answer = $this->getAnswer($attribute);
                        $personHasSurveyAnswerModel->save();
                    }
                }

                if (($survey_type == 'without' && $question_form_group == 1) || ($survey_type == 'with' && $question_form_group == 16)) {
                    $modelPerson = \app\models\Person::findOne ($person_id);
                    $modelPerson->survey_success = true;
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
    
    /**
     * 
     * @param type $question_form_group
     * @param type $survey_type
     * @return \app\controllers\questionFormGroupClass
     */
    public function getLastQuestionGroupAnswered($question_form_group, $survey_type, $person_id)
    {   
        if (\app\models\Person::findOne($person_id)->survey_success) return false;
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
