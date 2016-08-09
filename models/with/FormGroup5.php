<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup5 extends \yii\base\Model
{
    public $q13;
    public $q14;
    public $q15;
    public $q16;
    public $page = 5;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q13', 'q14', 'q15', 'q16'], 'required'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q13' => '13. De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a importância do conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?',
            'q14' => '14. De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a valorização dos estudantes para o conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?',
            'q15' => '15. De 0 a 10, sendo 0, nenhuma importância e 10 muita importância, como você classifica a valorização que a sua instituição atribui ao conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?',
            'q16' => '16. De 0 a 10, sendo 0, nenhum e 10 excelente, como você classifica seu domínio dos conhecimentos para ministrar o conteúdo ou disciplina de História da Enfermagem?',
        ];
    }
}