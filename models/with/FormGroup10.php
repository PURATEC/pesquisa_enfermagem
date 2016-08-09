<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup10 extends \yii\base\Model
{
    public $q27;
    public $q27_extra1;
    public $q27_extra2;
    public $q27_extra3;
    public $q27_extra_options;
    public $page = 10;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q27', 'q27_extra1', 'q27_extra2'], 'required'],
            [['q27_extra3'], 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q27' => '10. Idiomas',
            'q27_extra1' => 'Ingles: ',
            'q27_extra2' => 'Espanhol: ',
            'q27_extra3' => 'Outros',
            'q27_extra_options' => 'Sem conhecimento;Básico ou Regular;Avançado;Fluente',
        ];
    }
}