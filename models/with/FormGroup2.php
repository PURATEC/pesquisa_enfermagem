<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup2 extends \yii\base\Model
{
    public $q2;
    public $q3;
    public $q3_options;
    public $q4;
    public $q5;
    public $q5_options;
    public $q5_extra;
    public $q5_extra_options;
    public $page = 2;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q1', 'q2', 'q3', 'q4', 'q5', 'q6'], 'required'],
            [['q5_extra'], 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() 
    {
        return [
            'q2' => '2. Nome e código da disciplina',
            'q3' => '3. O conteúdo de História da Enfermagem:',
            'q3_options' => 'É oferecido em disciplina própria;É oferecido em disciplina integrada com outros conteúdos',
            'q4' => '4. Departamento ou setor responsável pelo conteúdo ou disciplina de História da Enfermagem:',
            'q5' => '5. Ano de oferecimento conteúdo ou disciplina de História da Enfermagem no curso de graduação:',
            'q5_options' => '1º Ano;2º Ano;3º Ano;4º Ano;5º Ano',
            'q5_extra' => '5.1. Período de oferecimento:',
            'q5_extra_options' => '1º Semestre;2º Semestre;Anual',
        ];
    }
}