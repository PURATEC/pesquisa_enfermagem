<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup6 extends \yii\base\Model
{
    public $q17;
    public $q17_options;
    public $q17_extra;
    public $page = 6;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q17'], 'required'],
            [['q17_extra'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q17' => '17. Como geralmente se dá a escolha do docente desse conteúdo ou disciplina de História da Enfermagem na sua instituição? Quais os critérios?',
            'q17_options' => 'Currículo específico;Concurso específico para a disciplina;Processo Seletivo específico para a disciplina;Afinidade com o tema;Professor contratado com menor carga horária;Disponibilidade;Outros'
        ];
    }
}