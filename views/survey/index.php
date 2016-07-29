<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SurveySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="survey-index">

    <?php 
    $personModels = app\models\Person::find(['survey_success' => true])->all();
    $average_aux = 0;
    foreach($personModels as $p):
        $datetime1 = new DateTime($p->created_at);
        $datetime2 = new DateTime($p->survey_success_at);
        $interval = $datetime1->diff($datetime2);
        $average_aux += $interval->d*24*60 + $interval->h*60 + $interval->i;
    endforeach;
    $average = $average_aux/count($personModels);
    ?>
    
    <div class="well-transparent" style="margin-bottom: 20px;">
            <a href="#" class="btn btn-sq-md btn-primary">
                <i class="fa fa-user fa-5x"></i><br/>
                TOTAL DE PESQUISAS <br> <?php echo count($personModels) ?>
            </a>
            <a href="#" class="btn btn-sq-md btn-success">
              <i class="fa fa-user fa-5x"></i><br/>
              PESQUISAS RESPONDIDAS <br> <?php echo count(app\models\Person::find()->where(['survey_success' => true])->all()) ?>
            </a>
            <a href="#" class="btn btn-sq-md btn-info">
              <i class="fa fa-user fa-5x"></i><br/>
              PESQUISAS NÃO FINALIZADAS <br> <?php echo count(app\models\Person::find()->where(['survey_success' => false])->all()) ?>
            </a>
            <a href="#" class="btn btn-sq-md btn-warning">
              <i class="fa fa-user fa-5x"></i><br/>
              TEMPO MÉDIO DE DURAÇÃO <br> <?= number_format((int)$average, 0, '.', ''); ?> minutos
            </a>
    </div>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'user_email',
                'label' => 'Email',
                'format' => 'raw',
                'value' => function($model){
                    if($model->users)
                    {
                        return $model->users[0]->email;
                    }
                    else
                    {
                        return '';
                    }
                }
            ], 
            [
                'attribute'=>'survey_success',
                'label' => 'Situação da pesquisa',
                'format' => 'html',
                'filter' => ['' => 'Ambas', 1 => 'Finalizada', 0 => 'Incompleta'],
                'value' => function($model){
                    return $model->survey_success ? 'Finalizada' : 'Incompleta';
                }
            ],      
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ações',
                'options' => ['width' => '200px'],
                'contentOptions' => ['style' => 'text-align: center;'],
                'template' => '{view} {export}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        $url = str_replace('view?id=', 'view?person_id=', $url);
                        if($model->survey_success)
                        {
                            return \yii\helpers\Html::a('<span class="fa fa-eye"></span> Visualizar', $url, [
                                'title' => 'Visualizar',
                                'class'=>'btn btn-primary btn-xs',                         
                            ]);
                        }
                    },
                    'export' => function ($url, $model) {
                        if($model->survey_success)
                        {
                            $url = str_replace('export?id=', 'export?person_id=', $url);
                            return \yii\helpers\Html::a('<span class="fa fa-edit"></span> Exportar', $url, [
                                'title' => 'Exportar',
                                'class'=>'btn btn-primary btn-xs',  
                            ]);
                        }
                        
                    },
                ],
            ]
        ],
    ]); ?>
</div>

<?php $this->registerJs("setActiveTab('custom-group');", \yii\web\VIEW::POS_READY); ?>