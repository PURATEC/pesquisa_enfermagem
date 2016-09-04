<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup8 extends \yii\base\Model
{
    public $q20;
    public $q20_options;
    public $q20_extra;
    public $q20_extra2;
    public $q21;
    public $q21_options;
    public $q21_extra;
    public $q21_extra2;
    public $q22;
    public $q22_options;
    public $q22_extra;
    public $q22_extra2;
    public $q23;
    public $q23_options;
    public $q23_extra;
    public $q23_extra_sit;
    public $q23_extra_sit_options;
    public $q23_extra2;
    public $q23_extra2_sit;
    public $q23_extra2_sit_options;
    public $q23_extra3;
    public $q23_extra3_sit;
    public $q23_extra3_sit_options;
    public $page = 8;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q20', 'q20_extra2', 'q21', 'q22', 'q23'], 'required'],
            [['q20_extra2', 'q21_extra2', 'q22_extra2'], 'integer'],
            [['q20_extra', 'q21_extra', 'q22_extra', 'q23_extra', 
                'q20_extra2', 'q21_extra2', 'q22_extra2', 'q23_extra2', 
                'q20_extra3', 'q21_extra3', 'q23_extra3',
                'q23_extra_sit', 'q23_extra2_sit', 'q23_extra3_sit'], 'safe'],
            [['q20_extra'], 'required', 'when' => function($model) {
                return $model->q20_extra == '3';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup8-q20').val() == '3';
            }"],
            [['q21_extra'], 'required', 'when' => function($model) {
                return $model->q21_extra == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup8-q21').val() == '1';
            }"]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q20' => '3. Qual sua formação inicial?',
            'q20_options' => 'Bacharel em Enfermagem;Bacharel e Licenciado em Enfermagem; Bacharel ou Licencitura em História;Outro',
            'q20_extra2' => '3.1. Ano de conclusão:',
            'q20_extra' => 'Outro: ',
            'q21_extra' => 'Outro: ',
            'q22_extra' => 'Especialização: ',
            'q21' => '4. Possui outro curso de graduação?',
            'q21_options' => 'Não;Sim',
            'q21_extra2' => '4.1. Ano de conclusão:',
            'q22' => '5. Possui curso de especialização?',
            'q22_options' => 'Não;Sim',
            'q22_extra2' => '5.1. Ano de conclusão:',
            'q23' => '6. Possui Pós-graduação Stricto Sensu?',
            'q23_options' => 'Mestrado;Doutorado;Pós-Doutorado',
            'q23_extra' => '6.2. Ano de conclusão:',
            'q23_extra_sit' => '6.1. Andamento:',
            'q23_extra_sit_options' => 'Em andamento;Concluído',
            'q23_extra2' => '6.2. Ano de conclusão:',
            'q23_extra2_sit' => '6.1. Andamento:',
            'q23_extra2_sit_options' => 'Em andamento;Concluído',
            'q23_extra3' => '6.2. Ano de conclusão:',
            'q23_extra3_sit' => '6.1. Andamento:',
            'q23_extra3_sit_options' => 'Em andamento;Concluído',
        ];
    }
}