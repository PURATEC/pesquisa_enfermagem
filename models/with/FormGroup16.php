<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup16 extends \yii\base\Model
{
    public $q40;
    public $q41;
    public $q42;
    public $q42_file;
    public $q43;
    public $q43_file;
    public $page = 16;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q40', 'q41'], 'required'],
            [['q42', 'q43'], 'safe'],
            [['q42_file', 'q43_file'], 'safe'],
            [['q42_file'], 'file', 'extensions' => 'pdf'],
            [['q43_file'], 'file', 'extensions' => 'pdf']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q40' => '22. O programa da disciplina de História da Enfermagem ou de seu conteúdo está de acordo com o que é ministrado em sala de aula? Ou atualizado?',
            'q41' => '23. Existe alguma atividade da disciplina de História da Enfermagem ou de seu conteúdo, que ainda não consta no programa da disciplina ou de sua bibliografia?',
            'q42' => '24. Por favor, Anexar arquivo ou colar texto do programa da disciplina de História da Enfermagem ou disciplina que trabalha o conteúdo de História da Enfermagem, ou link para site institucional com programa.',
            'q43' => '25. Por favor, Anexar arquivo ou colar texto com rede/grade curricular, do curso de Enfermagem com respectivas cargas horárias, ou link para site institucional com currículo.',
        ];
    }
}