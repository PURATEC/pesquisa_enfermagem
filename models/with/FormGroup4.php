<?php

namespace app\models\with;

/**
 * FormGroup1 is a group of form questions
 */
class FormGroup4 extends \yii\base\Model
{
    public $q10;
    public $q10_options;
    public $q10_extra;
    public $q11;
    public $q11_options;
    public $q11_extra;
    public $q12;
    public $page = 4;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['q10', 'q11', 'q12'], 'required'],
            [['q10_extra', 'q11_extra'], 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q10' => '10. Quais estratégias metodológicas são utilizadas na disciplina?',
            'q10_options' => 'aulas expositivas;aulas expositivas dialogadas;discussão de textos;seminários;encenação teatral;viagem didática;análise de documentos;outras',
            'q11' => '11. Quais os métodos de avaliação do aluno?',
            'q11_options' => 'participação em sala de aula;frequência;trabalhos individuais escritos;trabalhos em grupo escritos;apresentação de seminários;prova escrita;estudo dirigido;exercícios em sala de aula;outros',
            'q12' => '12. Qual a bibliografia utilizada na disciplina? Favor colar as referências utilizadas nesse espaço.',
        ];
    }
}