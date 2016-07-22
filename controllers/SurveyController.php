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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * The purpose of this function is to render a view for user choose survey type.
     * @return mixed
     */
    public function actionPreCreate()
    {
        return $this->render('pre-create');
    }
    
    /**
     * Creates a new Survey.
     * If creation is successful, the browser will be redirected to the respective 'create' page.
     * @return mixed
     */
    public function actionCreateWith($personID)
    {
        $model = Survey::findOne(2);
        $modelPerson = \app\models\Person::findOne($personID);
        
        $startedButNotFinished = false;
        if(\app\models\PersonAnswerSurveyQuestion::findOne(['person_id' => $personID, 'question_id'=> 22, 'survey_id' => 2]))
        {
            $startedButNotFinished = true;
        }
        
        $questionGroup = [];
        $answerGroup = [];
        if(!$startedButNotFinished)
        {
            for($i=4; $i<=22; $i++) 
            {
                $questionGroup[] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 2]);
                $answerGroup[] = new \app\models\PersonAnswerSurveyQuestion;
            }
        }
        else{
            for($i=23; $i<=39; $i++)
            {
                $questionGroup[] = \app\models\Question::findOne(['question_id' => $i, 'survey_id' => 2]);
                $answerGroup[] = new \app\models\PersonAnswerSurveyQuestion;
            }
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
        
        return $this->render('_survey-with', [
            'model' => $model,
            'modelPerson' => $modelPerson,
            'questionGroup' => $questionGroup,
            'answerGroup' => $answerGroup,
            'startedButNotFinished' => $startedButNotFinished
        ]);
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
}
