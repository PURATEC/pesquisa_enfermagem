    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($questionGroupModel, "q6")->textInput(['placeholder' => 'Ex: 120 horas']); ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($questionGroupModel, "q7")->textInput(['placeholder' => 'Ex: 120 horas']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $q7_extra_options = explode(';', $questionGroupModel->attributeLabels()['q7_extra_options']);
                    echo $form->field($questionGroupModel, "q7_extra")->dropDownList($q7_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
            <div id="q7_extra" class="col-sm-3" style="display:none;">
                <?= $form->field($questionGroupModel, "q7_extra1")->textInput(['id' => 'q7_extra1_field', 'placeholder' => 'Ex: 120 horas'])->label('Número de horas: '); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q8")->textarea(['placeholder' => 'Ex: Percebo que ...', 'rows' => 5]); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q9_options = explode(';', $questionGroupModel->attributeLabels()['q9_options']);
                    echo $form->field($questionGroupModel, "q9")->dropDownList($q9_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        
        <div id="q9_extra" class="row" style="display:none;">
            <div class="col-sm-10">
                <?= $form->field($questionGroupModel, "q9_extra")->textarea(['id' => 'q9_extra_field', 'placeholder' => 'Cite aqui as dificuldades ...', 'rows' => 5])->label(false); ?>
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
                        'onclick' => "$('#surveyForm').submit();"
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
    $('#formgroup3-q9').on('change', function()
    {
        if($('#formgroup3-q9').val() === '1')
        {
            $('#q9_extra').show();
        }
        else
        {
            $('#q9_extra').hide();
            $('#q9_extra_field').val('0');
        }
    });
    $('#formgroup3-q7_extra').on('change', function()
    {
        if($('#formgroup3-q7_extra').val() === '2')
        {
            $('#q7_extra').show();
        }
        else
        {
            $('#q7_extra').hide();
            $('#q9_extra1_field').val('0');
        }
    });
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);