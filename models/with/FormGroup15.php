<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup15 extends \yii\base\Model
{
    public $q37;
    public $q37_extra_options1;
    public $q37_extra_options2;
    public $q37_extra;
    public $q37_extra1;
    public $q37_extra2;
    public $q37_extra3;
    public $q37_extra4;
    public $q37_extra5;
    public $q37_extra6;
    public $q37_extra7;
    public $q37_extra8;
    public $q37_extra9;
    public $q38;
    public $q38_extra;
    public $q38_extra1;
    public $q38_extra2;
    public $q38_extra3;
    public $q38_extra4;
    public $q38_extra5;
    public $q38_extra6;
    public $q38_extra7;
    public $q38_extra8;
    public $q38_extra9;
    public $q39;
    public $q39_extra;
    public $q39_extra1;
    public $q39_extra2;
    public $q39_extra3;
    public $q39_extra4;
    public $q39_extra5;
    public $q39_extra6;
    public $q39_extra7;
    public $q39_extra8;
    public $q39_extra9;
    public $page = 15;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q37', 'q38', 'q39'], 'required'],
            [['q37_extra', 'q37_extra1', 'q37_extra2', 'q37_extra3', 'q37_extra4', 'q37_extra5', 'q37_extra6', 'q37_extra7', 'q37_extra8', 
                'q38_extra', 'q38_extra1', 'q38_extra2', 'q38_extra3', 'q38_extra4', 'q38_extra5', 'q38_extra6', 'q38_extra7', 'q38_extra8',
                'q39_extra', 'q39_extra1', 'q39_extra2', 'q39_extra3', 'q39_extra4', 'q39_extra5', 'q39_extra6', 'q39_extra7', 'q39_extra8'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q37' => '19. Possui orientação de alunos de mestrado?',
            'q38' => '20. Possui orientação em Tese de doutorado?',
            'q39' => '21. Possui orientação em Trabalho de Conclusão de Curso ou Iniciação científica?',
            'q37_options' => 'Não;Sim',
            'q37_extra_options1' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica; Enfermagem Obstétrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública;Outra',
            'q37_extra_options2' => '0;1;2;3;4;5;6;7;8;9;10;Mais de 10'
        ];
    }
}