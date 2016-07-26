<?php

/* @var $this yii\web\View */
/* @var $model app\models\Survey */
?>

<div class="survey-view">
    <?php $count = 1;
    echo "<legend>PARTE 1</legend>";
    foreach($modelsQuestion as $index => $q):
            echo "<br>".$count . '. '.$q->label."<br>";
            echo $modelsAnswer[$index] ? "R: &nbsp;&nbsp;&nbsp;".$modelsAnswer[$index]->answer : '';
            echo "<br>";

        if(! empty($modelsQuestionOption[$index])):
            foreach($modelsQuestionOption[$index] as $index2 => $q2):
                echo "&nbsp;&nbsp;&nbsp;".$count . '.'.($index2+1).'. '.$q2->label."&nbsp;&nbsp;";
                echo $modelsAnswerOption[$index][$index2] ? $modelsAnswerOption[$index][$index2]->option_answser : '';
                echo "<br>";
            endforeach;
        endif;
        $count++;
        
        if($count == 20):
            echo "<br><br><legend>PARTE 2</legend>";
        endif;
        
    endforeach; ?>
</div>
