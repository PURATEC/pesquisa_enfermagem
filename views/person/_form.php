<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">
    <?php $form = ActiveForm::begin(); ?>
  
    <legend>
        <h2><small><i class="fa fa-user"></i> Informações pessoais</small></h2>
    </legend>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'full_name')->textInput(['placeholder' => 
                $model->getAttributeLabel('full_name'), 'maxlength' => true])->label(false) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'rg')->textInput(['placeholder' => 
                $model->getAttributeLabel('rg'), 'maxlength' => true])->label(false) ?>
        </div>
    </div>
    
    <legend>
        <h2><small><i class="fa fa-map-marker"></i> Endereço</small></h2>
    </legend>
    
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'postalcode')->textInput(['placeholder' => 
                $model->getAttributeLabel('postalcode'), 'maxlength' => true])->label(false) ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'state')->textInput(['placeholder' => 
                $model->getAttributeLabel('state'), 'maxlength' => true])->label(false) ?>
        </div>
        
        <div class="col-sm-3">
            <?= $form->field($model, 'city')->textInput(['placeholder' => 
                $model->getAttributeLabel('city'), 'maxlength' => true])->label(false) ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'neighborhood')->textInput(['placeholder' => 
                $model->getAttributeLabel('neighborhood'), 'maxlength' => true])->label(false) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'streetname')->textInput(['placeholder' => 
                $model->getAttributeLabel('streetname'), 'maxlength' => true])->label(false) ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'number')->textInput(['placeholder' => 
                $model->getAttributeLabel('number'), 'maxlength' => true])->label(false) ?>
        </div>
        
        <div class="col-sm-3">
            <?= $form->field($model, 'complement')->textInput(['placeholder' => 
                $model->getAttributeLabel('complement'), 'maxlength' => true])->label(false) ?>
        </div>
    </div>
    
    <legend>
        <h2><small><i class="fa fa-mobile"></i> Contato</small></h2>
    </legend>
    
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'phone')->textInput(['placeholder' => 
                $model->getAttributeLabel('phone'), 'maxlength' => true])->label(false) ?>
        </div>
    </div>

    <hr>
    <div class="form-group">
        <center>
            <?= Html::submitButton("Próxima etapa", ['class' => 'btn btn-success btn-lg btn-block']) ?>
            <?= Html::a("Sair", 'index', ['class' => 'btn btn-danger btn-lg btn-block']) ?>
        </center>
        <?php ActiveForm::end(); ?>
    </div>

        <div class="row">
            <div class="col-md-6 borda-simples pad-top-10">
                <p class="t-centralizado">
                    Profa. Luciana Barizon Luchesi<br/>
                    Telefone: (16) 3315-0535<br/>
                    E-mail: luchesi@eerp.usp.br
                </p>
            </div>

           <div class="col-md-6 borda-simples pad-top-10">
                <p class="t-centralizado">
                    Carla Cristina da Cruz Almeida Lima<br/>
                    Telefone: (16) 98108-2080<br/>
                    E-mail: nina.kriska12@gmail.com
                </p>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col-md-12 borda-simples pad-top-10">
                <p class="t-centralizado">
                    Comitê de Ética em Pesquisa da Escola de Enfermagem de Ribeirão Preto - USP<br />
                    Telefone: (16) 3315-3386<br />
                    Horário de funcionamento: de segunda a sexta-feira, das 09h às 18h<br />
                    Escola de Enfermagem de Ribeirão Preto - USP<br />
                    Avenida Bandeirantes, 3.900 - CEP: 14.040-902
                </p>
            </div>
        </div>
        <br/>
    </div>
</div>
