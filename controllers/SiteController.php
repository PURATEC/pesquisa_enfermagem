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
                'only' => ['logout', 'send-mail'],
                'rules' => [
                    [
                        'actions' => ['logout', 'send-mail'],
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
                    if($user->type == 'Pesquisador')
                    {
                        return $this->redirect(['survey/index']); 
                    }
                    
                    else if($user->type == 'Entrevistado')
                    {
                        return $this->redirect(['survey/create', 'person_id' => $user->person_id]); 
                    }
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
                $user->last_login = date('Y-m-d H:i:s');
                
                if($user->tos == true)
                {
                    if($user->type == 'Pesquisador')
                    {
                        return $this->redirect(['survey/index']); 
                    }
                    
                    else if($user->type == 'Entrevistado')
                    {
                        return $this->redirect(['survey/create', 'person_id' => $user->person_id]); 
                    } 
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
     * Send mail with generated user
     * @return session
     */
    public function actionSendMail()
    {
        $this->layout = 'grid-layout';
        
        $model = new \app\models\User;
        
        if($model->load(Yii::$app->request->post()))
        {     
            // Valida regras que necessitam de ajax
            if(Yii::$app->request->isAjax)
            {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model, ['email']);
            }
            
            $randomPassword = \app\components\utils\Utils::getRandomAlphanumeric(8);
            $model->password = Yii::$app->getSecurity()->generatePasswordHash(strtolower($randomPassword));
            $model->type = 'Entrevistado';
            $model->last_login = date('Y-m-d H:i:s');
            
            if($model->save())
            {
                if($model->sendMail($model->email, $randomPassword))
                {
                    Yii::$app->session->setFlash('success', 'E-mail enviado com sucesso!');
                }
            }
        }
        
        return $this->render('send-mail', [
            'model' => $model
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
