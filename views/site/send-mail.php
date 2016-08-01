<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Disparar e-mails
                </h3>
            </div>
            <div class="panel-body">
                <div class="reset-password-form">
                    <?php $form = ActiveForm::begin([
                        'id' => 'send-mail-form',
                        'enableAjaxValidation' => true
                    ]); ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]); ?>
                    
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
                <br>
                <?= Yii::$app->session->getFlash('success'); ?>
            </div>
        </div>
    </div>
</div>