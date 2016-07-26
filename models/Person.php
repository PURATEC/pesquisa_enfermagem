<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "person".
 *
 * @property integer $person_id
 * @property string $full_name
 * @property string $rg
 * @property string $postalcode
 * @property string $state
 * @property string $city
 * @property string $neighborhood
 * @property string $streetname
 * @property string $number
 * @property string $complement
 * @property string $phone
 * @property boolean $survey_success
 * @property string $created_at
 *
 * @property PersonAnswerSurveyQuestion[] $personAnswerSurveyQuestions
 * @property User[] $users
 */
class Person extends \yii\db\ActiveRecord
{
    public $termsOfService;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }
    
    public function behaviors() {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => function() {
                    return date('Y-m-d');
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
            [['full_name', 'rg', 'postalcode', 'state', 'city', 'neighborhood', 'streetname', 'number', 'phone'], 'required'],
            ['termsOfService','required', 'requiredValue' => true, 'on' => 'tos', 
                'message'=> 'Você precisa concordar com o termo de consentimento'],
            [['survey_success', 'termsOfService'], 'boolean'],
            [['rg'], 'unique'],
            [['rg'], 'string', 'max' => 11],
            [['postalcode'], 'string', 'max' => 8],
            [['full_name', 'city'], 'string', 'max' => 70],
            [['state'], 'string', 'max' => 2],
            [['neighborhood'], 'string', 'max' => 80],
            [['streetname'], 'string', 'max' => 120],
            [['number'], 'string', 'max' => 10],
            [['complement'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'ID Pessoa',
            'full_name' => 'Nome completo do participante',
            'rg' => 'Documento de identidade (RG)',
            'postalcode' => 'Código postal (CEP)',
            'state' => 'Estado',
            'city' => 'Cidade',
            'neighborhood' => 'Bairro',
            'streetname' => 'Nome da rua',
            'number' => 'Número',
            'complement' => 'Complemento',
            'phone' => 'Telefone',
            'survey_success' => 'Formulário preenchido?',
            'created_at' => 'Data de criação',
            'survey_success_at' => 'Data de finalização',
            'termsOfService' => 'Diante do exposto, declaro que estou ciente das informações '
            . 'recebidas e que concordo voluntariamente em participar deste estudo, '
            . 'recebendo uma via desse termo, o que me permitirá entrar em contato com o '
            . 'pesquisador e com o Comitê de Ética em Pesquisa, em algum outro momento, '
            . 'caso eu deseje ou sinta necessidade de obter novos esclarecimentos a respeito deste estudo.'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonAnswerSurveyQuestions()
    {
        return $this->hasMany(PersonAnswerSurveyQuestion::className(), ['person_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['person_id' => 'person_id']);
    }
    
    /**
     * Send email to reset and warning the user about password change
     * @param string $email
     * @return email
     */
    public function sendTermsOfService($email)
    {
        // Envia um email com o termo de consentimento 
        return Yii::$app->mailer->compose(['html' => 'layouts/mail'])
        ->setTo($email)
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setSubject('Termo de consentimento')
        ->send();
    }
}
