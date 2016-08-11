<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_has_survey_answer".
 *
 * @property integer $person_has_survey_answer_id
 * @property integer $person_id
 * @property integer $survey_id
 * @property integer $question
 * @property string $answer
 * @property string $created_at
 *
 * @property Person $person
 * @property Survey $survey
 */
class PersonHasSurveyAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_has_survey_answer';
    }

    public function behaviors() {
        return[
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
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
            [['person_id', 'survey_id', 'question', 'answer'], 'required'],
            [['person_id', 'survey_id'], 'integer'],
            [['question', 'answer'], 'string'],
            [['created_at'], 'safe'],
            [['person_id'], 'exist', 'skipOnError' => false, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
            [['survey_id'], 'exist', 'skipOnError' => false, 'targetClass' => Survey::className(), 'targetAttribute' => ['survey_id' => 'survey_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_has_survey_answer_id' => 'Person Has Survey Answer ID',
            'person_id' => 'Person ID',
            'survey_id' => 'Survey ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'created_at' => 'Created At',
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
     * @return \yii\db\ActiveQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(Survey::className(), ['survey_id' => 'survey_id']);
    }
}
