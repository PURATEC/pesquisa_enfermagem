<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup3 extends \yii\base\Model
{
    public $q6;
    public $q7;
    public $q7_extra;
    public $q7_extra1;
    public $q7_extra_options;
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
            [['q6', 'q7', 'q7_extra', 'q8', 'q9'], 'required'],
            [['q7_extra1'], 'safe']
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
            'q7_extra' => '7.1 Você considera a carga horária do conteúdo ou disciplina de História da Enfermagem suficiente no curso de graduação em Enfermagem que está inserido?',
            'q7_extra_options' => 'Sim, a carga horária do conteúdo ou disciplina de História da Enfermagem é suficiente para as necessidades do curso.;Sim, a carga horária do conteúdo ou disciplina de História da Enfermagem excede as necessidades do curso.;Não, a carga horária do conteúdo ou disciplina de História da Enfermagem é menor que as necessidades do curso. A carga horária ideal seria de ______h',
            'q8' => '8. Como você percebe a importância do conteúdo ou da disciplina de História da Enfermagem na formação do enfermeiro?',
            'q9' => '9. Encontra dificuldades para ministrar o conteúdo ou disciplina de História da Enfermagem?',
            'q9_options' => 'Não;Sim, quais?'
          
        ];
    }
}