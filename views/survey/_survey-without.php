<?php
/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $questionGroup app\models\PersonAnswerSurveyQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form">
    
        <center style="width: 70%; height: 160px; margin: 0px auto;">
            <?php if($modelPerson->survey_success):
                $personSurveySuccessBtn = 'btn-success';
            else: 
                $personSurveySuccessBtn = 'btn-default';
            endif; ?>
            <a href="javascript:void(0);" class="btn btn-sq-sm btn-info">
                <i class="fa fa-wpforms fa-5x"></i><br/><br/>
            </a>
            <b>Etapa única</b>
            <br/><br/>
            <hr>
        </center>
    
    <br/>
    
    <?php if(!$modelPerson->survey_success): ?>
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($model, 'survey_id')->hiddenInput()->label(false); ?>

        <?php foreach($questionGroup as $index => $q):
            echo "<div class='col-sm-".$q->size."' style='text-align: justify;'>";
            if($q->element_type == 'text'):
                echo $form->field($answerGroup[$index], "[{$index}]answer")->textInput(['placeholder' => $q->placeholder])->label($index+1 . '. '.$q->label);
            elseif($q->element_type == 'textarea'):
                echo $form->field($answerGroup[$index], "[{$index}]answer")->textarea(['placeholder' => $q->placeholder])->label($index+1 . '. '.$q->label);
            elseif($q->element_type == 'select'):
                $options = explode(';', $q->options);
                echo $form->field($answerGroup[$index], "[{$index}]answer")->dropDownList($options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label($index+1 . '. '.$q->label);
            elseif($q->element_type == 'checkbox'):
                $options = explode(';', $q->options);
                echo $form->field($answerGroup[$index], "[{$index}]answer")
                    ->checkboxList($options, ['separator' => "<br>"])->label($index+1 . '. '.$q->label);
            elseif($q->element_type == 'radio'):
                $options = explode(';', $q->options);
                echo $form->field($answerGroup[$index], "[{$index}]answer")
                    ->radioList($options, ['separator' => "<br>"])->label($index+1 . '. '.$q->label);
            elseif($q->element_type == 'slider'):
               echo $form->field($model, 'rating')->widget(Slider::classname(), [
                    'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                    'handleColor' => \kartik\slider\Slider::TYPE_DANGER,
                    'pluginOptions'=>[
                        'handle' => 'triangle',
                        'tooltip' => 'always'
                    ]
                ]);
            endif;
            echo "</div>";
        endforeach;
        ?>

        <center>
            <div class="col-sm-6">
                <?= \yii\helpers\Html::a("<i class='fa fa-undo'></i> Voltar", 
                    ['index'], 
                    ['class' => 'btn btn-danger btn-lg btn-block']
                ); ?>
            </div>
            <div class="col-sm-6">
                <?= \yii\helpers\Html::submitButton("<i class='fa fa-check-circle-o'></i> Salvar",
                    ['class' => 'btn btn-success btn-lg btn-block']
                ); ?>
            </div>
        </center>

        <?php \yii\widgets\ActiveForm::end(); ?>
    <?php else:
        echo $this->render('thanks');
    endif; ?>
</div>
