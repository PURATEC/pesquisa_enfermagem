<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup9 extends \yii\base\Model
{
    public $q24;
    public $q24_options;
    public $q25;
    public $q25_extra;
    public $q25_extra1;
    public $q26;
    public $q26_extra;
    public $q26_extra1;
    public $q26_extra2;
    public $q26_extra3;
    public $q26_extra4;
    public $q26_extra5;
    public $q26_extra6;
    public $q26_extra7;
    public $q26_extra8;
    public $page = 9;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q24', 'q25', 'q26', 'q25_extra'], 'required'],
            [['q25_extra1', 'q26_extra', 'q26_extra1', 'q26_extra2', 'q26_extra3', 'q26_extra4', 'q26_extra5', 'q26_extra6', 'q26_extra7', 'q26_extra8'], 'safe'],
            [['q25_extra1'], 'required', 'when' => function($model) {
                return $model->q25_extra == '7';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup9-q25_extra').val() == '7';
            }"],
            [['q26_extra', 'q26_extra1', 'q26_extra2'], 'required', 'when' => function($model) {
                return $model->q26 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup9-q26').val() == '1';
            }"],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q24' => '7. Há quanto tempo é responsável pela disciplina ou conteúdo de História da Enfermagem?',
            'q24_options' => 'Menos de 1 ano;De 1 à 3 anos;De 4 à 6 anos;De 7 à 9 anos;Mais de 10 anos',
            'q25' => '8. Qual a sua carga horária semanal média nessa instituição de ensino?',
            'q25_extra' => ' 8.1 Qual o cargo atual que você desempenha na instituição de ensino em que ministra o conteúdo de História da Enfermagem?',
            'q25_extra_options' => 'Enfermeiro;Enfermeiro Especialista;Professor Mestre;Professor Doutor;Professor Associado ou Livre-Docente;Professor Assistente;Professor Titular;Outro',
            'q26' => '9. Possui outro vinculo empregatício?',
            'q26_options' => 'Não;Sim',
            'q25_extra1' => 'Outro: ',
            'q26_extra' => 'Instituição: ',
            'q26_extra1' => 'Função: ',
            'q26_extra2' => 'Carga horária: '
        ];
    }
}