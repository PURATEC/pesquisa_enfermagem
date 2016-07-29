<?php

/* @var $this yii\web\View */
/* @var $model app\models\Survey */
?>

<div class="survey-view">
    
    <div class="well">
        <?= $modelPerson->users[0]->email ?>
        <?= yii\helpers\Html::a('Exportar', \yii\helpers\Url::to(['export', 'person_id' => $modelPerson->person_id])); ?>
    </div>
    
    <?php $count = 1;
    echo "<legend>PARTE 1</legend>";
    foreach($modelsQuestion as $index => $q):
            echo "<br>".$count . '. '.$q->label."<br>";
            if($q->element_type == 'select'):
                echo $modelsAnswer[$index] ? "R: &nbsp;&nbsp;&nbsp;".explode(';', $q->options)[$modelsAnswer[$index]->answer] : '';
            elseif($q->element_type == 'checkbox' || $q->element_type == 'radio'):
                echo "R: &nbsp;&nbsp;&nbsp;";
                foreach(explode(';', $modelsAnswer[$index]->answer) as $exp):
                    echo explode(';', $q->options)[$exp]."; ";
                endforeach;
            else:
                echo $modelsAnswer[$index] ? "R: &nbsp;&nbsp;&nbsp;".$modelsAnswer[$index]->answer : '';
            endif;
            echo "<br>";

        if(! empty($modelsQuestionOption[$index])):
            foreach($modelsQuestionOption[$index] as $index2 => $q2):
                if($modelsAnswerOption[$index][$index2]):
                    echo "&nbsp;&nbsp;&nbsp;".$count . '.'.($index2+1).'. '.$q2->label."&nbsp;&nbsp;";
                    if($q2->element_type == 'select'):
                        if($modelsAnswerOption[$index][$index2]->option_answer != ''):
                            echo $modelsAnswerOption[$index][$index2] ? "<br>&nbsp;&nbsp;&nbsp;R: &nbsp;&nbsp;&nbsp;".explode(';', $q2->options)[$modelsAnswerOption[$index][$index2]->option_answer] : '';
                        endif;
                    elseif($q2->element_type == 'file'):
                        echo \yii\helpers\Html::a('Download do anexo', yii\helpers\Url::to(['download', 'person_id' => $modelPerson->person_id, 'question_id' => $modelsQuestion[$index]->question_id, 'question_option_id' => $modelsQuestionOption[$index][$index2]->question_option_id]));
                    else:
                        echo $modelsAnswerOption[$index][$index2] ? "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R: &nbsp;&nbsp;&nbsp;".$modelsAnswerOption[$index][$index2]->option_answer : '';
                    endif;
                else:
                    echo "R: &nbsp;&nbsp;&nbsp;Não";
                endif;
                echo "<br>";
            endforeach;
        endif;
        $count++;
        
        if($count == 18):
            echo "<br><br><legend>PARTE 2</legend>";
        endif;
    endforeach; ?>
</div>
