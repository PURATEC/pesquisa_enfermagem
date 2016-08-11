<div class="row">
    <div id="current_page_form_group" class="col-sm-6 pull-left"><h4>Página atual: <small>1</small></h4> </div>
    <div class="col-sm-2 pull-right"><h4>Total de Páginas: <small><?= $survey_type == 'with' ? '17' : '1'; ?></small></h4></div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            <a>
                <i class="fa fa-send-o"> &nbsp;Instituições <?= $survey_type === 'with' ? 'com' : 'sem'?> a disciplina ou conteúdo de história da enfermagem</i>
            </a>
        </h4>
        
        <div id="survey_form_container_buttons">
            <?php echo \yii\helpers\Html::a(
                '', 
                ['render-form-group', 'survey_type' => $survey_type, 'question_form_group' => 1, 'person_id' => $person_id],
                ['id' => 'btn2RenderSurveyQuestionGroup'],
                ['data-pjax' => '#survey_form_pjax']
            ); ?>
        </div>
        
    </div>

    <?php yii\widgets\Pjax::begin([
        'id' => 'survey_form_pjax', 
        'linkSelector'=>'#survey_form_container_buttons a',
        'formSelector' => '#surveyForm',  
        'enablePushState' => false
    ]) ?>
    
    <?php yii\widgets\Pjax::end() ?>
</div>

<?php
$js1 = <<<'EOD'
    $('#btn2RenderSurveyQuestionGroup').click();
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);