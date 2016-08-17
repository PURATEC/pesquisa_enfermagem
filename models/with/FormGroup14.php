<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup14 extends \yii\base\Model
{
    public $q36;
    public $q36_extra_options1;
    public $q36_extra_options2;
    public $q36_extra;
    public $q36_extra1;
    public $q36_extra2;
    public $q36_extra3;
    public $q36_extra4;
    public $q36_extra5;
    public $q36_extra6;
    public $page = 14;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q36'], 'required'],
            [['q36_extra', 'q36_extra1', 'q36_extra2', 'q36_extra3', 'q36_extra4', 'q36_extra5'], 'safe'],
            
            [['q36_extra', 'q36_extra1'], 'required', 'when' => function($model) {
                return $model->q36 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup14-q36').val() == '1';
            }"],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q36' => '18. Participação em congressos ou eventos de porte nacional/regional?',
            'q36_options' => 'Não;Sim',
            'q36_extra_options1' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica; Enfermagem Obstétrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública;Outra',
            'q36_extra_options2' => '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
            'q36_extra' => 'Área: ', 
            'q36_extra1' => 'Quantidade: '
        ];
    }
}