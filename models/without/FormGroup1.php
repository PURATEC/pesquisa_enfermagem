<?php

namespace app\models\without;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup1 extends \yii\base\Model
{
    public $q1;
    public $q1_options;
    public $q2;
    public $q3;
    public $page = 1;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q1'], 'required'],
            [['q2'], 'required', 'when' => function($model) {
                return $model->q1 != 0;
            }], 
            [['q3'], 'required', 'when' => function($model) {
                return $model->q1 != 0;
            }]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() 
    {
        return [
            'q1' => '1. A disciplina ou conteúdo de História da Enfermagem já foi oferecido em períodos anteriores?',
            'q1_options' => 'Não;Sim, o conteúdo era ministrado em Disciplina própria;Sim, o conteúdo era ministrado em Disciplina integrada a outros temas',
            'q2' => '2. Em que ano a disciplina ou conteúdo de História da Enfermagem deixou de ser oferecida como disciplina específica ou associada?',
            'q3' => '3. Qual o motivo para a remoção da disciplina?',
        ];
    }
}