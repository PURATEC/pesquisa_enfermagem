<?php

/* @var $this yii\web\View */
/* @var $model app\models\Survey */

$this->title = 'Selecionar tipo de pesquisa';
?>

<div class="survey-create">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <a><i class="fa fa-send-o"> &nbsp;Instituições sem a disciplina ou conteúdo de história da enfermagem</i></a>
            </h4>
        </div>
        <div class="panel-body">
            <div class="alert alert-warning">
                <strong>Alerta!</strong> Apenas acesse este bloco se a sua instituição <u>não oferece</u> disciplina ou conteúdo de história da enfermagem! Caso seja oferecida a disciplina, pule para o próximo bloco.
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= \yii\helpers\Html::a('Acessar questionário para instituições sem o conteúdo de história da enfermagem', 
                        ['create-without?person_id='.$person_id],
                        ['class' => 'btn btn-warning btn-lg btn-block']
                    ); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <a><i class="fa fa-send-o"> &nbsp;Instituições com a disciplina ou conteúdo de história da enfermagem</i></a>
            </h4>
        </div>
        <div class="panel-body">
            <div class="alert alert-warning">
                <strong>Alerta!</strong> Apenas acesse este bloco se a sua instituição <u>oferece</u> disciplina ou conteúdo de história da enfermagem!
                <br /><br />Este questionário é composto de duas partes:
                <ul>
                    <li>Etapa 1 - Dados da disciplina 17 questões - tempo médio de resposta 10min</li>
                    <li>Etapa 2 - Dados do docente  24 questões - tempo médio de resposta 20min</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <?= \yii\helpers\Html::a('Acessar questionário para instituições com o conteúdo de história da enfermagem', 
                        ['create-with?person_id='.$person_id],
                        ['class' => 'btn btn-warning btn-lg btn-block']
                    ); ?>
                </div>
            </div>

        </div>
    </div>
</div>
