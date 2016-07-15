<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_answer_survey_question".
 *
 * @property integer $person_id
 * @property integer $survey_id
 * @property integer $question_id
 * @property string $answer
 * @property string $created_at
 *
 * @property Person $person
 * @property Question $question
 * @property Survey $survey
 */
class PersonAnswerSurveyQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_answer_survey_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'survey_id', 'question_id', 'answer', 'created_at'], 'required'],
            [['person_id', 'survey_id', 'question_id'], 'integer'],
            [['answer'], 'string'],
            [['created_at'], 'safe'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'question_id']],
            [['survey_id'], 'exist', 'skipOnError' => true, 'targetClass' => Survey::className(), 'targetAttribute' => ['survey_id' => 'survey_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'survey_id' => 'Survey ID',
            'question_id' => 'Question ID',
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
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['question_id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(Survey::className(), ['survey_id' => 'survey_id']);
    }
}
