<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup11 extends \yii\base\Model
{
    public $q28;
    public $q28_options;
    public $q28_qt;
    public $q28_extra;
    public $q28_extra1;
    public $q28_extra2;
    public $q28_extra3;
    public $q28_extra4;
    public $q28_extra5;
    public $q28_extra6;
    public $q28_extra7;
    public $q28_extra8;
    public $q28_extra9;
    public $page = 11;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q28'], 'required'],
            [['q28_qt', 'q28_extra', 'q28_extra1', 'q28_extra2', 'q28_extra3', 'q28_extra4', 'q28_extra5', 'q28_extra6', 'q28_extra7', 'q28_extra8', 'q28_extra9'], 'safe'],
            [['q28_qt', 'q28_extra', 'q28_extra1', 'q28_extra2'], 'required', 'when' => function($model) {
                return $model->q28 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup11-q28').val() == '1';
            }"],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q28' => '11. Você é responsável por outras disciplinas?',
            'q28_options' => 'Não;Sim',
            'q28_qt' => 'Quantas?',
            'q28_extra' => 'Nome da disciplina',
            'q28_extra1' => 'Carga horária',
            'q28_extra2' => 'Área',
            'q28_extra3' => 'Nome da disciplina',
            'q28_extra4' => 'Carga horária',
            'q28_extra5' => 'Área',
            'q28_extra6' => 'Nome da disciplina',
            'q28_extra7' => 'Carga horária',
            'q28_extra8' => 'Área',
            'q28_extra9' => 'Outras? Quais?',
            'q28_extra_options' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica; Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública;Outra',
        ];
    }
}