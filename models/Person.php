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
            [['survey_success'], 'boolean'],
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
            'person_id' => 'Person ID',
            'full_name' => 'Full Name',
            'rg' => 'Rg',
            'postalcode' => 'Postalcode',
            'state' => 'State',
            'city' => 'City',
            'neighborhood' => 'Neighborhood',
            'streetname' => 'Streetname',
            'number' => 'Number',
            'complement' => 'Complement',
            'phone' => 'Phone',
            'survey_success' => 'Survey Success',
            'created_at' => 'Created At',
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
