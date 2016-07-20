<?php
/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form">

    <?php
    $wizard_config = [
        'id' => 'stepwizard',
        'steps' => [
            1 => [
                'title' => 'Step 1',
                'icon' => 'fa fa-user',
                'content' => 'conteudo da pesquisa 1',
                'skippable' => false,
            ],
            2 => [
                'title' => 'Step 2',
                'icon' => 'glyphicon glyphicon-cloud-upload',
                'content' => '<h3>Step 2</h3>This is step 2',
                'skippable' => false,
            ],
            3 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-transfer',
                'content' => '<h3>Step 3</h3>This is step 3',
                'skippable' => false,
            ],
            4 => [
                'title' => 'Step 1',
                'icon' => 'glyphicon glyphicon-cloud-download',
                'content' => '<h3>Step 1</h3>This is step 1',
                'skippable' => false,
            ],
            5 => [
                'title' => 'Step 2',
                'icon' => 'glyphicon glyphicon-cloud-upload',
                'content' => '<h3>Step 2</h3>This is step 2',
                'skippable' => false,
            ],
            6 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-transfer',
                'content' => '<h3>Step 3</h3>This is step 3',
                'skippable' => false,
            ],
            7 => [
                'title' => 'Step 1',
                'icon' => 'glyphicon glyphicon-cloud-download',
                'content' => '<h3>Step 1</h3>This is step 1',
                'skippable' => false,
            ],
            8 => [
                'title' => 'Step 2',
                'icon' => 'glyphicon glyphicon-cloud-upload',
                'content' => '<h3>Step 2</h3>This is step 2',
                'skippable' => false,
            ],
            9 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-transfer',
                'content' => '<h3>Step 3</h3>This is step 3',
                'skippable' => false,
            ],
        ],
        'complete_content' => "You are done!", // Optional final screen
        'start_step' => 1, // Optional, start with a specific step
    ]; ?>

    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

</div>
