<?php

/* @var $this yii\web\View */
/* @var $model app\models\Survey */
?>

<div class="survey-view">

    <div class="row">
        <div class="col-sm-8">
            <h4>Nome do usuário: <small><?= \app\models\Person::findOne($person_id)->users[0]->email ?></small></h4> 
            <?= yii\helpers\Html::a('Exportação completa', \yii\helpers\Url::to(['export', 'person_id' => $person_id]), ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php if (\app\models\PersonHasSurveyAnswer::findOne(['person_id' => $person_id, 'question' => 'q42_file'])): ?>
            <div class="col-sm-12">
                <?= \yii\helpers\Html::a('Download do anexo questão 24', yii\helpers\Url::to(['download', 'person_id' => $person_id, 'question' => 'q42_file']), ['class' => 'btn btn-warning btn-sm']); ?>
            </div>
            <br><br>
        <?php endif; ?>
        <?php if (\app\models\PersonHasSurveyAnswer::findOne(['person_id' => $person_id, 'question' => 'q43_file'])): ?>
            <div class="col-sm-12">
                <?= \yii\helpers\Html::a('Download do anexo questão 25', yii\helpers\Url::to(['download', 'person_id' => $person_id, 'question' => 'q43_file']), ['class' => 'btn btn-warning btn-sm']); ?>
            </div>
            <br><br>
        <?php endif; ?>
    </div>
</div>
