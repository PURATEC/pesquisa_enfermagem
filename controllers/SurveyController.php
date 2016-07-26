<?php

namespace app\controllers;

use Yii;
use app\models\Survey;
use app\models\SurveySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * SurveyController implements the CRUD actions for Survey model.
 */
class SurveyController extends Controller
{
    public $layout = 'survey';
    
    /**
     * Lists all Survey models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'grid-layout';
        
        $searchModel = new SurveySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Survey model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewWith($person_id)
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
        
        
        return $this->render('view', [
            'modelPerson' => \app\models\Person::findOne($person_id),
            'modelsQuestion' => $modelsQuestion,
            'modelsQuestionOption' => $modelsQuestionOption,
            'modelsAnswer' => $modelsAnswer,
            'modelsAnswerOption' => $modelsAnswerOption,
        ]);
    }

    /**
     * The purpose of this function is to render a view for user choose survey type.
     * @return mixed
     */
    public function actionCreate($person_id = null)
    {
        if($person_id)
        {
            if(\app\models\Person::findOne($person_id)->survey_success)
            {
                return $this->render('thanks');
            }
            else
            {
                return $this->render('pre-create', ['person_id' => $person_id]);
            }
        }
        return $this->redirect(['index']);
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
        
        if(! $modelPerson->survey_success)
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

            if ($model->load(Yii::$app->request->post()) && 
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
                        $modelPerson->termsOfService = true;
                        if($modelPerson->save())
                        {
                            $transaction->commit();
                            if(! $modelPerson->survey_success)
                            {
                                return $this->redirect(['create-with', 'person_id' => $person_id]);
                            }
                            else
                            {
                                return $this->redirect(['thanks']);
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
        else
        {
            return $this->redirect(['thanks']);
        }
    }
    
    /**
     * Creates a new Survey.
     * If creation is successful, the browser will be redirected to the respective 'create' page.
     * @return mixed
     */
    public function actionCreateWithout($personID)
    {
        $model = Survey::findOne(1);
        $modelPerson = \app\models\Person::findOne($personID);
        
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
                        $modelAnswer->person_id = $personID;
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
                        if($modelPerson->save())
                        {
                            $transaction->commit();
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
        

        $filename = 'Data-'.Date('YmdGis').'-test.xls';
        
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        
        echo '<table border="1" width="100%">
            <thead>
                <tr>';
                foreach($modelsQuestion as $index => $q):
                    echo "<th>$q->label</th>";
                    foreach($modelsQuestionOption[$index] as $index2 => $q2):
                        echo "<th>$q2->label</th>";
                    endforeach;
                endforeach;
                '</tr>
            </thead>';
                echo '<tr>';
                    foreach($modelsAnswer as $index => $a1):
                        if($a1):
                            if($modelsQuestion[$index]->element_type == 'select'):
                                echo $modelsAnswer[$index] ? "<td>".explode(';', $modelsQuestion[$index]->options)[$modelsAnswer[$index]->answer] : '<td>'; echo "</td>";
                            elseif($modelsQuestion[$index]->element_type == 'checkbox' || $modelsQuestion[$index]->element_type == 'radio'):
                                foreach(explode(';', $modelsAnswer[$index]->answer) as $exp):
                                    echo "<td>".explode(';', $modelsQuestion[$index]->options)[$exp]."; "; echo "</td>";
                                endforeach;
                            else:
                                echo $modelsAnswer[$index] ?"<td>".$modelsAnswer[$index]->answer : '<td>'; echo "</td>";
                            endif;
                        endif;
                    endforeach;
                '</tr>';
        echo '</table>';
    }
}

//foreach($modelsQuestion as $index => $q):
//    if($q->element_type == 'select'):
//        echo $modelsAnswer[$index] ? "R: &nbsp;&nbsp;&nbsp;".explode(';', $q->options)[$modelsAnswer[$index]->answer] : '';
//    elseif($q->element_type == 'checkbox' || $q->element_type == 'radio'):
//        echo "R: &nbsp;&nbsp;&nbsp;";
//        foreach(explode(';', $modelsAnswer[$index]->answer) as $exp):
//            echo explode(';', $q->options)[$exp]."; ";
//        endforeach;
//    else:
//        echo $modelsAnswer[$index] ? "R: &nbsp;&nbsp;&nbsp;".$modelsAnswer[$index]->answer : '';
//    endif;
//    echo "<br>";
//
//    if(! empty($modelsQuestionOption[$index])):
//        foreach($modelsQuestionOption[$index] as $index2 => $q2):
//            if($modelsAnswerOption[$index][$index2]):
//                echo "&nbsp;&nbsp;&nbsp;".$count . '.'.($index2+1).'. '.$q2->label."&nbsp;&nbsp;";
//                if($q2->element_type == 'select'):
//                    if($modelsAnswerOption[$index][$index2]->option_answer != ''):
//                        echo $modelsAnswerOption[$index][$index2] ? "<br>&nbsp;&nbsp;&nbsp;R: &nbsp;&nbsp;&nbsp;".explode(';', $q2->options)[$modelsAnswerOption[$index][$index2]->option_answer] : '';
//                    endif;
//                else:
//                    echo $modelsAnswerOption[$index][$index2] ? "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R: &nbsp;&nbsp;&nbsp;".$modelsAnswerOption[$index][$index2]->option_answer : '';
//                endif;
//            else:
//                echo "R: &nbsp;&nbsp;&nbsp;Não";
//            endif;
//            echo "<br>";
//        endforeach;
//    endif;
//endforeach; ?>