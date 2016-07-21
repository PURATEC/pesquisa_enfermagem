<?php
/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $questionGroup app\models\PersonAnswerSurveyQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form">
    
    <?php $form = \yii\widgets\ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'survey_id')->hiddenInput()->label(false); ?>
    
    <?php
    $content = '';
    foreach($questionGroup as $index => $q):
        
        if($q->element_type == 'text'):
            $content .= "<div class='col-sm-8'>";
            $content .= $form->field($answerGroup[$index], "[{$index}]answer")
                ->textInput()
                ->label($index+1 . '. '.$q->label);
            $content .= "</div>";
            
        elseif($q->element_type == 'select'):
            $options = explode(';', $q->options);
            $content .= "<div class='col-sm-8'>";
            $content .= $form->field($answerGroup[$index], "[{$index}]answer")
                    ->dropDownList($options, ['prompt' => 'placeholder'])->label($index+1 . '. '.$q->label);
            $content .= "</div>";
            
        elseif($q->element_type == 'radio'):
            $options = explode(';', $q->options);
            $content .= "<div class='col-sm-8'>";
            $content .= $form->field($answerGroup[$index], "[{$index}]answer")
                ->radioList($options, 
                    [
                        'item' => function($index, $label, $name, $checked, $value) {

                            $return = '<label class="modal-radio">';
                            $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                            $return .= ' ' . $label . '';
                            $return .= '</label>';
                            $return .= '<br>';
                            return $return;
                        }
                    ]
                )
                ->label($index+1 . '. '.$q->label);
            $content .= "</div>";
        endif;
        
    endforeach;
    ?>
    
    <?php
    $wizard_config = [
        'id' => 'stepwizard',
        'steps' => [
            1 => [
                'title' => 'Step 1',
                'icon' => 'fa fa-book',
                'content' => "$content",
                'skippable' => false,
                'buttons' => [
                    'save' => [
                        'html' => yii\helpers\Html::submitButton("<i class='fa fa-check-circle-o'></i> Salvar", ['class' => 'btn btn-primary btn-lg'])
                    ]
                 ],
            ],
        ],
        'start_step' => 1
    ]; ?>

    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

    <?php \yii\widgets\ActiveForm::end(); ?>
</div>
