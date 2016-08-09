<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup13 extends \yii\base\Model
{
    public $q33;
    public $q33_extra;
    public $q33_extra1;
    public $q33_extra2;
    public $q33_extra3;
    public $q33_extra4;
    public $q33_extra5;
    public $q34;
    public $q34_extra;
    public $q34_extra1;
    public $q34_extra2;
    public $q34_extra3;
    public $q34_extra4;
    public $q34_extra5;
    public $q34_extra6;
    public $q34_extra7;
    public $q34_extra8;
    public $q34_extra9;
    public $q34_extra10;
    public $q34_extra11;
    public $q35;
    public $q35_extra_options;
    public $q35_extra;
    public $q35_extra1;
    public $q35_extra2;
    public $q35_extra3;
    public $q35_extra4;
    public $q35_extra5;
    public $q35_extra6;
    public $q35_extra7;
    public $q35_extra8;
    public $q35_extra9;
    public $q35_extra10;
    public $q35_extra11;
    public $q35_extra12;
    public $page = 13;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q33', 'q34', 'q35'], 'required'],
            [['q33_extra', 'q33_extra1', 'q33_extra2', 'q33_extra3', 'q33_extra4', 'q33_extra5',
                'q34_extra', 'q34_extra1', 'q34_extra2', 'q34_extra3', 'q34_extra4', 'q34_extra5',
                    'q34_extra6', 'q34_extra7', 'q34_extra8', 'q34_extra9', 'q34_extra10', 'q34_extra11',
                'q35_extra', 'q35_extra1', 'q35_extra2', 'q35_extra3', 'q35_extra4', 'q35_extra5',
                   'q35_extra7', 'q35_extra8', 'q35_extra9', 'q35_extra10', 'q35_extra11'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q33' => '16. Produziu artigos completos publicados em periódicos na área de História da Enfermagem?',
            'q34' => '16.2 - Produziu artigos completos publicados em periódicos em outras áreas da Enfermagem?',
            'q33_options' => 'Não;Sim',
            'q33_extra_options' => 'Nenhuma;Revista Latino Americana de Enfermagem;Revista de Escola de Enfermagem da USP;Acta Paulista de Enfermagem;Revista Brasileira de Enfermagem;Revista Texto e Contexto;Revista Escola de Enfermagem Anna Nery;Revista Gaúcha de Enfermagem;Revista Reuol;Revista Mineira de Enfermagem REME;Revista Escola de Enfermagem da UERJ;História da Enfermagem - Revista Eletrônica (HERE)',
            'q34_extra_options' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública',
            'q35' => '17. Produziu livros e capítulos',
            'q35_extra_options' => '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
            'q35_extra' => 'a) Livros',
            'q35_extra6' => 'b) Capítulos',
        ];
    }
}