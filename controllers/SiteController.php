<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout = 'survey';
    public $defaultAction = 'login';
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Login process to authenticate the user
     * @return home page url
     */
    public function actionLogin()
    {   
        // Verifica se o usuário não é um visitante
        if(!Yii::$app->user->isGuest) 
        { 
            $user = \app\models\User::findOne(['user_id' => Yii::$app->user->id]);
            
            if(isset($user))
            {
                if($user->tos == true)
                {
                    return $this->redirect(['survey/create']); 
                }
                
                else
                {
                    return $this->redirect(['person/terms-of-service']);
                }
            } 
            
            else
            {
                throw new NotFoundHttpException('A página solicitada não existe');
            }
        }
        
        $model = new LoginForm; 
        
        if($model->load(Yii::$app->request->post()))
        {     
            if($model->login())
            {
                $user = $model->getUser();
                
                if($user->tos == true)
                {
                    return $this->redirect(['survey/create']); 
                }
                
                else
                {
                    return $this->redirect(['person/terms-of-service']);
                }
            }
        }
        
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
