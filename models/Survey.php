<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey".
 *
 * @property integer $survey_id
 * @property string $name
 * @property boolean $active
 *
 * @property PersonAnswerSurveyQuestion[] $personAnswerSurveyQuestions
 * @property Question[] $questions
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'survey';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['active'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'survey_id' => 'Survey ID',
            'name' => 'Name',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonAnswerSurveyQuestions()
    {
        return $this->hasMany(PersonAnswerSurveyQuestion::className(), ['survey_id' => 'survey_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['survey_id' => 'survey_id']);
    }
}
