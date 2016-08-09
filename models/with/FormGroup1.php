<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup1 extends \yii\base\Model
{
    public $q1;
    public $q1_extra;
    public $page = 1;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q1', 'q1_extra'], 'required'],
            [['q2'], 'integer'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() 
    {
        return [
            'q1' => '1. Qual a sua instituição?',
            'q1_extra' => '1.1. Ano de contratação',
        ];
    }
}