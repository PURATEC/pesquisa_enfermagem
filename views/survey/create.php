<?php

/* @var $this yii\web\View */
/* @var $model app\models\Survey */

$this->title = 'Pesquisa';
?>

<div class="survey-create">
    <a href="<?= \yii\helpers\Url::to(['create-survey-one']); ?>" class="btn btn-sq-lg btn-primary">
        <i class="fa fa-user fa-5x"></i><br/>
        <br/>
        Apenas acesse este bloco se a sua instituição <br><b><u>não oferece</u></b> disciplina ou conteúdo de história da enfermagem! <br>
        <b>Clique para acessar</b>
    </a>
    
    <a href="<?= \yii\helpers\Url::to(['create-survey-two']); ?>" class="btn btn-sq-lg btn-success">
      <i class="fa fa-user fa-5x"></i><br/>
      <br/>
      Apenas acesse este bloco se a sua instituição <br><b><u>oferece</u></b> disciplina ou conteúdo de história da enfermagem! <br>
      <b>Clique para acessar</b>
    </a>
</div>
