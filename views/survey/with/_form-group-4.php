    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $q10_options = explode(';', $questionGroupModel->attributeLabels()['q10_options']);
                    echo $form->field($questionGroupModel, "q10")->checkboxList($q10_options, ['separator' => "<br>"]);
                ?>
            </div>
        </div>
        <div id="q10_extra" class="row" style="display:none;">
            <div class="col-sm-10">
                <?= $form->field($questionGroupModel, "q10_extra")->textarea(['placeholder' => 'Cite aqui as outras ...', 'rows' => 5])->label(false); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $q11_options = explode(';', $questionGroupModel->attributeLabels()['q11_options']);
                    echo $form->field($questionGroupModel, "q11")->checkboxList($q11_options, ['separator' => "<br>"]);
                ?>
            </div>
        </div>
        <div id="q11_extra" class="row" style="display:none;">
            <div class="col-sm-10">
                <?= $form->field($questionGroupModel, "q11_extra")->textarea(['placeholder' => 'Cite aqui os outros ...', 'rows' => 5])->label(false); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q12")->textarea(['placeholder' => 'Coloque aqui a bibliografia', 'rows' => 5]); ?>
            </div>
        </div>
    </div>
    
    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-6">
                <?= \yii\helpers\Html::a(
                    "<i class='fa fa-arrow-circle-o-left fa-3x'></i> <h4>ESCOLHER OUTRA PESQUISA</h4>", 
                    ['pre-create'], 
                    ['class' => 'btn btn-danger btn-block', 'disabled' => true]
                ); ?>
            </div>
            <div class="col-sm-6">
                <?= \yii\helpers\Html::a(
                    "<i class='fa fa-check-circle-o fa-3x'></i> <h4>SALVAR</h4>",
                    'javascript:void(0);', [
                        'class' => 'btn btn-success btn-block', 
                        'onclick' => "$('#surveyForm').submit(); $('#current_page_form_group').find('small').text($questionGroupModel->page+1);"
                    ]
                ); ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>

<?php
$this->registerJs("$('#current_page_form_group').find('small').text('".$questionGroupModel->page." (ETAPA 1)');", \yii\web\View::POS_END);

$js1 = <<<'EOD'
    $("input[name='FormGroup4[q10][]']").change(function() {
        if(this.value === '7') $('#q10_extra').toggle();
    });
    $("input[name='FormGroup4[q11][]']").change(function() {
        if(this.value === '8') $('#q11_extra').toggle();
    });
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);