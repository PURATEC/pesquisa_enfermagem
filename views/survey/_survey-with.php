<?php
/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $questionGroup app\models\PersonAnswerSurveyQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form">
    
        <center style="width: 70%; height: 160px; margin: 0px auto;">
            
            <?php if($startedButNotFinished):
                $btnSecond = 'btn-info';
            else: 
                $btnSecond = 'btn-default';
            endif; ?>
            
            <a href="javascript:void(0);" class="btn btn-sq-sm btn-info">
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
            
            <a href="javascript:void(0);" class="btn btn-sq-sm">
                <br/><i class="fa fa-arrow-right fa-3x"></i>
            </a>
            <a href="javascript:void(0);" class="btn btn-sq-sm btn-default">
                <i class="fa fa-check-circle-o fa-5x"></i><br/><br/>
            </a>
            <b><?php $modelPerson->survey_success ? 'Finalização' : 'Concluído!'; ?></b>
            
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
                    ->dropDownList($options)
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
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answser")
                            ->textInput(['placeholder' => $q2->placeholder])
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'textarea'):
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answser")
                            ->textarea(['placeholder' => $q2->placeholder])
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'select'):
                        $options = explode(';', $q2->options);
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answser")
                            ->dropDownList($options)
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'checkbox'):
                        $options = explode(';', $q2->options);
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answser")
                            ->checkboxList($options, ['separator' => "<br>"])
                            ->label($q2->label ? $q2->label : false);
                    elseif($q2->element_type == 'radio'):
                        $options = explode(';', $q2->options);
                        echo $form->field($modelsAnswerOption[$index][$index2], "[{$index}][{$index2}]option_answser")
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
