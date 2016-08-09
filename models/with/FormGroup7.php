<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup7 extends \yii\base\Model
{
    public $q18;
    public $q18_options;
    public $q19;
    public $page = 7;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q18', 'q19'], 'required'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q18' => '1. Gênero:',
            'q18_options' => 'Masculino;Feminino',
            'q19' => '2. Idade:'
        ];
    }
}