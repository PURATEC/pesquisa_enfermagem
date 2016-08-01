<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property integer $person_id
 * @property string $email
 * @property string $password
 * @property string $type
 * @property boolean $tos
 * @property string $last_login
 * @property boolean $active
 * @property string $created_at
 *
 * @property Person $person
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    
    public function behaviors() {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => function() {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'type', 'last_login'], 'required'],
            [['tos', 'active'], 'boolean'],
            [['last_login'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 64],
            [['type'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['person_id'], 'exist', 'skipOnError' => false, 'targetClass' => Person::className(), 
                'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID usuário',
            'person_id' => 'ID pessoa',
            'email' => 'E-mail',
            'password' => 'Senha',
            'type' => 'Tipo de usuário',
            'tos' => 'Termo de consentimento',
            'last_login' => 'Último acesso',
            'active' => 'Estado do usuário',
            'created_at' => 'Data de criação',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return User::findOne($id);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        
    }
    
    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    
    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email) 
    {
        // Verifica se a string é um E-mail válido
        if((filter_var($email, FILTER_VALIDATE_EMAIL)) !== false) 
        {
            return User::find()->where(['email' => $email])->one();
        } 
        
        else 
        {
            return null;
        }
    }
    
    /**
     * Send email with user password
     * @param string $email
     * @return email
     */
    public function sendMail($email, $password)
    {
        // Envia um email com o termo de consentimento 
        return Yii::$app->mailer->compose()
        ->setTo($email)
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setSubject('Acesso do usuário')
        ->setHtmlBody('<p>' . Yii::t('app', 'Texto para estimular o usuário a responder a pesquisa.') . '</p>' .
                '<p>E-mail: ' . $email . '</p>' . 
                '<p>Senha: ' . $password . '</p>' . 
                '<p>' . \yii\helpers\Html::a('http://www.rehe.com.br', 
                        \yii\helpers\Url::to(['index'], 'http')) .'</p>')
        ->send();
    }
}
