<?php

namespace app\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'postalcode', 'state', 'city', 'neighborhood', 'streetname', 'number', 'phone', 'created_at'], 'required'],
            ['termsOfService','required', 'requiredValue' => true, 
                'message'=> 'Você precisa aceitar o termo de consentimento'],
            [['survey_success', 'termsOfService'], 'boolean'],
            [['created_at'], 'safe'],
            [['full_name', 'city'], 'string', 'max' => 70],
            [['rg'], 'string', 'max' => 11],
            [['postalcode'], 'string', 'max' => 8],
            [['state'], 'string', 'max' => 2],
            [['neighborhood'], 'string', 'max' => 80],
            [['streetname'], 'string', 'max' => 120],
            [['number'], 'string', 'max' => 10],
            [['complement'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['rg'], 'unique'],
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
}
