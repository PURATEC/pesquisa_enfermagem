    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q28_options = explode(';', $questionGroupModel->attributeLabels()['q28_options']);
                    echo $form->field($questionGroupModel, "q28")->dropDownList($q28_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q28_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                
                <div class="col-sm-6">
                    <?= $form->field($questionGroupModel, "q28_qt")->textInput(['placeholder' => 'Ex: 10 disciplinas']); ?>
                </div>
                
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra")->textInput(['placeholder' => 'Escreva aqui o nome da disciplina'])->label('Nome da disciplina'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra1")->textInput(['placeholder' => 'Carga horária'])->label('Carga horária'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                    $q28_extra_options = explode(';', $questionGroupModel->attributeLabels()['q28_extra_options']);
                                    echo $form->field($questionGroupModel, "q28_extra2")->dropDownList($q28_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra3")->textInput(['placeholder' => 'Escreva aqui o nome da disciplina'])->label('Nome da disciplina'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra4")->textInput(['placeholder' => 'Carga horária'])->label('Carga horária'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra5")->dropDownList($q28_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']); ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra6")->textInput(['placeholder' => 'Escreva aqui o nome da disciplina'])->label('Nome da disciplina'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra7")->textInput(['placeholder' => 'Carga horária'])->label('Carga horária'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q28_extra8")->dropDownList($q28_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($questionGroupModel, "q28_extra9")->textarea(['placeholder' => 'Escreva aqui outras disciplinas ...', 'rows' => 5]); ?>
                        </div>
                    </div>
                </div>
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
$this->registerJs("$('#current_page_form_group').find('small').text('".$questionGroupModel->page." (ETAPA 2)');", \yii\web\View::POS_END);

$js1 = <<<'EOD'
$("#formgroup11-q28").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q28_extra').show();
    }
    else
    {
    $('#q28_extra').hide();
    }
});

    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);