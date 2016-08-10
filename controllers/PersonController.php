<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use app\models\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
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
                'only' => ['logout', 'terms-of-service'],
                'rules' => [
                    [
                        'actions' => ['logout', 'terms-of-service'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Terms of service for user agree or not agree.
     * @return mixed
     */
    public function actionTermsOfService()
    {
        $model = new Person(['scenario' => 'tos']);
        
        $user = \app\models\User::findOne(['user_id' => Yii::$app->user->id]);
        
        if($model->load(Yii::$app->request->post()))
        {
            // Valida regras que necessitam de ajax
            if (Yii::$app->request->isAjax) 
            {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model, ['rg']);
            }
            
            // Se os termos de serviço foram aceitos
            if($model->termsOfService == true)
            {
                if($model->save())
                {
                    $user->tos = $model->termsOfService;
                    $user->person_id = $model->person_id;
                    
                    if($user->save())
                    {
                        if($model->sendTermsOfService($user->email))
                        {
                            $this->redirect(['survey/pre-create', 'person_id' => $model->person_id]);
                        }
                    }
                }   
            }
        }
        
        else
        {    
            return $this->render('terms-of-service', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página solicitada não existe');
        }
    }
}
