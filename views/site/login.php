<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="row">
    <div class="col-md-9">
        <p>Bem vindo ao portal de Rastreamento no Ensino de História da Enfermagem!</p>
        <p>Nessa perspectiva, pretende-se identificar o contexto curricular da disciplina da História da Enfermagem, nos cursos de graduação em Enfermagem, do estado de São Paulo, analisando os programas oferecidos, cargas horárias, assim como os currículos dos docentes que estão envolvidos e as dificuldades encontradas pelos docentes para o avanço da disciplina nos currículos de graduação.</p>
        <br />
        <p>Os objetivos específicos deste projeto são:</p>
        <ul>
            <li><p>Analisar a inserção ou ausência da disciplina de História da Enfermagem ou seus conteúdos em outras disciplinas</p></li>
            <li><p>Analisar a formação dos professores responsáveis pela disciplina de História da Enfermagem</p></li>
            <li><p>Analisar os programas da disciplina de História da Enfermagem e carga horária</p></li>
            <li><p>Analisar as estratégias pedagógicas e principais temas abordados</p></li>
            <li><p>Analisar as principais dificuldades vivenciadas pelos docentes, no ensino de História da Enfermagem</p></li>
        </ul>
    </div>
    <div class="col-md-3">
        <legend>
            <p class="text-center">Acesso ao formulário</p>
        </legend>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
        ]); ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail'])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Senha'])->label(false) ?>

            <?= Html::submitButton('Começar', ['class' => 'btn btn-success btn-lg btn-block']) ?> 
        <?php ActiveForm::end(); ?>
    </div>
</div>