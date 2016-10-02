<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup12 extends \yii\base\Model
{
    public $q29;
    public $q29_options;
    public $q29_qt;
    public $q29_extra;
    public $q29_extra1;
    public $q29_extra2;
    public $q29_extra3;
    public $q29_extra4;
    public $q29_extra5;
    public $q29_extra6;
    public $q29_extra7;
    public $q29_extra8;
    public $q29_extra9;
    public $q30;
    public $q30_extra;
    public $q30_extra1;
    public $q30_extra2;
    public $q30_extra3;
    public $q30_extra4;
    public $q31;
    public $q31_extra;
    public $q31_extra1;
    public $q31_extra2;
    public $q31_extra3;
    public $q31_extra4;
    public $q31_extra5;
    public $q31_extra6;
    public $q31_extra7;
    public $q31_extra8;
    public $q31_extra9;
    public $q31_extra10;
    public $q31_extra11;
    public $q32;
    public $q32_options;
    public $q32_extra;
    public $q32_extra1;
    public $q32_extra2;
    public $q32_extra3;
    public $q32_extra4;
    public $q32_extra5;
    public $q32_extra6;
    public $q32_extra7;
    public $q32_extra8;
    public $q32_extra9;
    public $q32_extra10;
    public $q32_extra11;
    public $page = 12;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q29', 'q30', 'q31', 'q32'], 'required'],
            [['q29_qt', 'q29_extra', 'q29_extra1', 'q29_extra2', 'q29_extra3', 'q29_extra4', 'q29_extra5', 'q29_extra6', 'q29_extra7', 'q29_extra8', 'q29_extra9',
                'q30_extra', 'q30_extra1', 'q30_extra2', 'q30_extra3', 'q30_extra4',
                'q31_extra', 'q31_extra1', 'q31_extra2', 'q31_extra3', 'q31_extra4', 
                    'q31_extra5', 'q31_extra6', 'q31_extra7', 'q31_extra8',
                    'q31_extra9', 'q31_extra10', 'q31_extra11',
                'q32_extra', 'q32_extra1', 'q32_extra2', 'q32_extra3', 'q32_extra4', 
                    'q32_extra5', 'q32_extra6', 'q32_extra7', 'q32_extra8',
                    'q32_extra9', 'q32_extra10', 'q32_extra11'], 'safe'],
            
            [['q29_extra', 'q29_extra1'], 'required', 'when' => function($model) {
                return $model->q29 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup12-q29').val() == '1';
            }"],
                    
            [['q30_extra'], 'required', 'when' => function($model) {
                return $model->q30 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup12-q30').val() == '1';
            }"],
                    
            [['q31_extra', 'q31_extra1', 'q31_extra2'], 'required', 'when' => function($model) {
                return $model->q31 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup12-q31').val() == '1';
            }"],
                    
            [['q32_extra', 'q32_extra1', 'q32_extra2'], 'required', 'when' => function($model) {
                return $model->q31 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#formgroup12-q32').val() == '1';
            }"],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q29' => '12. Participa de algum grupo de pesquisa?',
            'q29_options' => 'Não;Sim',
            'q29_options_1' => 'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de Doenças Contagiosas;Enfermagem de Saúde Pública',
            'q29_options_2' => 'Paritipante;Líder;Vice-Líder',
            'q29_extra8' => 'Outros? Quais?',
            'q30' => '13. Atua em alguma linha ou linhas de pesquisa?',
            'q30_options' => 'Não;Sim',
            'q31' => '14. Participa de projetos de pesquisa?',
            'q31_options' => 'Não;Sim',
            'q31_options_1' => '0;1;2;3;4;5;6;7;8;9;10; Mais de 10',
            'q32' => '15. Atua em algum projeto de extensão?',
            'q32_options' => 'Não;Sim',
            'q29_extra' => 'Área: ', 
            'q29_extra1' => 'Função:',
            'q30_extra' => 'Linha de pesquisa: ',
            'q31_extra' => 'Área: ', 
            'q31_extra1' => 'Em andamento: ', 
            'q31_extra2' => 'Concluídos: ',
            'q32_extra' => 'Área: ', 
            'q32_extra1' => 'Em andamento: ', 
            'q32_extra2' => 'Concluídos: '
            
        ];
    }
}