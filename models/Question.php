<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $question_id
 * @property integer $survey_id
 * @property string $element_type
 * @property string $label
 * @property string $options
 * @property boolean $active
 *
 * @property PersonAnswerSurveyQuestion[] $personAnswerSurveyQuestions
 * @property Survey $survey
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['survey_id', 'element_type', 'label', 'active'], 'required'],
            [['survey_id'], 'integer'],
            [['label', 'options'], 'string'],
            [['active'], 'boolean'],
            [['element_type'], 'string', 'max' => 20],
            [['survey_id'], 'exist', 'skipOnError' => true, 'targetClass' => Survey::className(), 'targetAttribute' => ['survey_id' => 'survey_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'Question ID',
            'survey_id' => 'Survey ID',
            'element_type' => 'Element Type',
            'label' => 'Label',
            'options' => 'Options',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonAnswerSurveyQuestions()
    {
        return $this->hasMany(PersonAnswerSurveyQuestion::className(), ['question_id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(Survey::className(), ['survey_id' => 'survey_id']);
    }
}
