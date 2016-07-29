<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_option".
 *
 * @property integer $question_option_id
 * @property integer $question_id
 * @property string $element_type
 * @property integer $size
 * @property string $label
 * @property string $options
 *
 * @property PersonAnswerSurveyQuestionOption[] $personAnswerSurveyQuestionOptions
 * @property Question[] $questions
 * @property Question $question
 */
class QuestionOption extends \yii\db\ActiveRecord
{
    public $file;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'element_type', 'label'], 'required'],
            [['question_id', 'size'], 'integer'],
            [['label', 'options'], 'string'],
            [['file'], 'file'],
            [['element_type'], 'string', 'max' => 20],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'question_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_option_id' => 'Question Option ID',
            'question_id' => 'Question ID',
            'element_type' => 'Element Type',
            'size' => 'Size',
            'label' => 'Label',
            'options' => 'Options',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonAnswerSurveyQuestionOptions()
    {
        return $this->hasMany(PersonAnswerSurveyQuestionOption::className(), ['question_option_id' => 'question_option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['question_id' => 'question_id'])->viaTable('person_answer_survey_question_option', ['question_option_id' => 'question_option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['question_id' => 'question_id']);
    }
}
