<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_answer_survey_question_option".
 *
 * @property integer $question_option_id
 * @property integer $question_id
 * @property string $option_answser
 * @property string $created_at
 *
 * @property Question $question
 * @property QuestionOption $questionOption
 */
class PersonAnswerSurveyQuestionOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_answer_survey_question_option';
    }
    
    public function behaviors()
    {
        return 
        [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'question_id'], 'required'],
            [['person_id', 'question_id'], 'integer'],
            [['option_answer'], 'string'],
            [['created_at'], 'safe'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'question_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'question_id' => 'Question ID',
            'option_answer' => 'Option Answser',
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
}
