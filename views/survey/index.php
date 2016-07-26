<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SurveySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="survey-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'survey_id',
            'name:ntext',
            'active:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php $this->registerJs("setActiveTab('custom-group');", \yii\web\VIEW::POS_READY); ?>