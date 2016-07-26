<?php
/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $questionGroup app\models\PersonAnswerSurveyQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form">
    
        <center style="width: 70%; height: 160px; margin: 0px auto;">
            
            <?php if($startedButNotFinished):
                $btnPrim = 'btn-success';
                $btnSecond = 'btn-info';
            else: 
                $btnPrim = 'btn-info';
                $btnSecond = 'btn-default';
            endif; ?>
            
            <a href="javascript:void(0);" class="btn btn-sq-sm <?= $btnPrim ?>">
                <i class="fa fa-wpforms fa-5x"></i><br/><br/>
            </a>
            <b>Dados da disciplina</b>
            
            <a href="javascript:void(0);" class="btn btn-sq-sm">
                <br/><i class="fa fa-arrow-right fa-3x"></i>
            </a>
            <a href="javascript:void(0);" class="btn btn-sq-sm <?= $btnSecond ?>">
                <i class="fa fa-wpforms fa-5x"></i><br/><br/>
            </a>
            <b>Dados do Professor</b>
            <br/><br/>
            <hr>
        </center>
    
    <br/>
    
    <?php if(!$modelPerson->survey_success): ?>
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($model, 'survey_id')->hiddenInput()->label(false); ?>
    
        <?php $count = 1; ?>
        <?php foreach($modelsQuestion as $index => $q):
            echo "<div class='col-sm-".$q->size."' style='text-align: justify;'>";

            if($q->element_type == 'empty'):
                echo \yii\helpers\Html::label($count . '. '.$q->label);
            elseif($q->element_type == 'text'):
                echo $form->field($modelsAnswer[$index], "[{$index}]answer")
                    ->textInput(['placeholder' => $q->placeholder])
                    ->label($count . '. '.$q->label);
            elseif($q->element_type == 'textarea'):
                echo $form->field($modelsAnswer[$index], "[{$index}]answer")
                    ->textarea(['placeholder' => $q->placeholder])
                    ->label($count . '. '.$q->label);
            elseif($q->element_type == 'select'):
                $options = explode(';', $q->options);
                echo $form->field($modelsAnswer[$index], "[{$index}]answer")
                    ->dropDownList($options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])
                    ->label($count . '. '.$q->label);
            elseif($q->element_type == 'checkbox'):
                $options = explode(';', $q->options);
                echo $form->field($modelsAnswer[$index], "[{$index}]answer")
                    ->checkboxList($options, ['separator' => "<br>"])
                    ->label($count . '. '.$q->label);
            elseif($q->element_type == 'radio'):
                $options = explode(';', $q->options);
                echo $form->field($modelsAnswer[$index], "[{$index}]answer")
                    ->radioList($options, ['separator' => "<br>"])
                    ->label($count . '. '.$q->label);
            elseif($q->element_type == 'slider'):
                echo \yii\helpers\Html::label($count . '. '.$q->label);
                echo "<br><br><br><br><br>";
                echo $form->field($modelsAnswer[$index], "[{$index}]answer")->widget(\kartik\slider\Slider::classname(), [
                    'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                    'handleColor' => \kartik\slider\Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'handle' => 'triangle',
                        'tooltip' => 'always',
                        'formatter' => new yii\web\JsExpression("function(val) { 
                            if (val <= 3) {
                                return 'Pouco';
                            }
                            if (val > 3 && val <= 7) {
                                return 'Médio';
                            }
                            if (val > 7 && val <= 10) {
                                return 'Muito';
                            }
                        }")
                    ]
                ]);
            endif;
            echo "</div>";
            
            if(! empty($modelsQuestionOption[$index])):
                foreach($modelsQuestionOption[$index] as $index2 => $q2):
                    echo "<div class='col-sm-".$q2->size."' style='text-align: justify;'>";
            
                    if($q2->element_type == 'text'):
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answer")
                            ->textInput(['placeholder' => $q2->placeholder])
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'textarea'):
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answer")
                            ->textarea(['placeholder' => $q2->placeholder])
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'select'):
                        $options = explode(';', $q2->options);
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answer")
                            ->dropDownList($options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'checkbox'):
                        $options = explode(';', $q2->options);
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answer")
                            ->checkboxList($options, ['separator' => "<br>"])
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'radio'):
                        $options = explode(';', $q2->options);
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answer")
                            ->radioList($options, ['separator' => "<br>"])
                            ->label($q2->label ? $q2->label : false);
                    endif;
                    echo "</div>";
                endforeach;
            endif;
            $count++;
        endforeach;
        ?>

        <center>
            <div class="col-sm-6">
                <?= \yii\helpers\Html::a("<i class='fa fa-undo'></i> Voltar", 
                    ['/dynamicform/custom-form/index'], 
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


<?php if(! $startedButNotFinished):
    $this->registerJs("$('#personanswersurveyquestionoption-12-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-12-0-option_answer], input#personanswersurveyquestionoption-12-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-13-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-13-0-option_answer], input#personanswersurveyquestionoption-13-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-14-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-14-0-option_answer], input#personanswersurveyquestionoption-14-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-20-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-20-0-option_answer], input#personanswersurveyquestionoption-20-0-option_answer').hide();", \yii\web\View::POS_END);
else:
    $this->registerJs("$('#personanswersurveyquestionoption-23-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-23-1-option_answer], input#personanswersurveyquestionoption-23-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-24-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-24-1-option_answer], input#personanswersurveyquestionoption-24-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-24-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-24-2-option_answer], input#personanswersurveyquestionoption-24-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-25-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-25-1-option_answer], input#personanswersurveyquestionoption-25-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-25-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-25-2-option_answer], input#personanswersurveyquestionoption-25-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-29-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-29-0-option_answer], input#personanswersurveyquestionoption-29-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-29-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-29-1-option_answer], input#personanswersurveyquestionoption-29-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-29-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-29-2-option_answer], input#personanswersurveyquestionoption-29-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-31-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-31-0-option_answer], input#personanswersurveyquestionoption-31-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-31-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-31-1-option_answer], input#personanswersurveyquestionoption-31-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-31-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-31-2-option_answer], input#personanswersurveyquestionoption-31-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-31-3-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-31-3-option_answer], input#personanswersurveyquestionoption-31-3-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-32-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-32-0-option_answer], input#personanswersurveyquestionoption-32-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-32-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-32-1-option_answer], input#personanswersurveyquestionoption-32-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-33-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-33-0-option_answer], input#personanswersurveyquestionoption-33-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-34-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-34-0-option_answer], input#personanswersurveyquestionoption-34-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-34-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-34-1-option_answer], input#personanswersurveyquestionoption-34-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-34-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-34-2-option_answer], input#personanswersurveyquestionoption-34-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-35-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-35-0-option_answer], input#personanswersurveyquestionoption-35-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-35-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-35-1-option_answer], input#personanswersurveyquestionoption-35-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-35-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-35-2-option_answer], input#personanswersurveyquestionoption-35-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-36-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-36-0-option_answer], input#personanswersurveyquestionoption-36-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-36-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-36-1-option_answer], input#personanswersurveyquestionoption-36-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-37-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-37-0-option_answer], input#personanswersurveyquestionoption-37-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-37-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-37-1-option_answer], input#personanswersurveyquestionoption-37-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-40-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-40-0-option_answer], input#personanswersurveyquestionoption-40-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-40-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-40-1-option_answer], input#personanswersurveyquestionoption-40-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-41-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-41-0-option_answer], input#personanswersurveyquestionoption-41-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-41-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-41-1-option_answer], input#personanswersurveyquestionoption-41-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-41-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-41-2-option_answer], input#personanswersurveyquestionoption-41-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-42-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-42-0-option_answer], input#personanswersurveyquestionoption-42-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-42-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-42-1-option_answer], input#personanswersurveyquestionoption-42-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-42-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-42-2-option_answer], input#personanswersurveyquestionoption-42-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-43-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-43-0-option_answer], input#personanswersurveyquestionoption-43-0-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-43-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-43-1-option_answer], input#personanswersurveyquestionoption-43-1-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('#personanswersurveyquestionoption-43-2-option_answer').hide();", \yii\web\View::POS_END);
    $this->registerJs("$('label[for=personanswersurveyquestionoption-43-2-option_answer], input#personanswersurveyquestionoption-43-2-option_answer').hide();", \yii\web\View::POS_END);
endif;