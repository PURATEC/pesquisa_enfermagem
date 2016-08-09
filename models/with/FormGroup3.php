<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup3 extends \yii\base\Model
{
    public $q6;
    public $q7;
    public $q8;
    public $q9;
    public $q9_options;
    public $page = 3;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q6', 'q7', 'q8', 'q9'], 'required']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q6' => '6. Carga horária total da Disciplina:',
            'q7' => '7. Carga horária do conteúdo de História:',
            'q8' => '8. Como você percebe a importância do conteúdo ou da disciplina de História da Enfermagem na formação do enfermeiro?',
            'q9' => '9. Encontra dificuldades para ministrar o conteúdo ou disciplina de História da Enfermagem?',
            'q9_options' => 'Não;Sim, quais?'
          
        ];
    }
}