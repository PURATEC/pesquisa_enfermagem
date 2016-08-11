    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q36_options = explode(';', $questionGroupModel->attributeLabels()['q36_options']);
                    echo $form->field($questionGroupModel, "q36")->dropDownList($q36_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q36_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                $q36_extra_options1 = explode(';', $questionGroupModel->attributeLabels()['q36_extra_options1']);
                                echo $form->field($questionGroupModel, "q36_extra")->dropDownList($q36_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                $q36_extra_options2 = explode(';', $questionGroupModel->attributeLabels()['q36_extra_options2']);
                                echo $form->field($questionGroupModel, "q36_extra1")->dropDownList($q36_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q36_extra2")->dropDownList($q36_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q36_extra3")->dropDownList($q36_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q36_extra4")->dropDownList($q36_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q36_extra5")->dropDownList($q36_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <?= $form->field($questionGroupModel, "q36_extra6")->textarea(['placeholder' => 'Outros ...'])->label('Outros:'); ?>
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
$("#formgroup14-q36").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q36_extra').show();
    }
    else
    {
    $('#q36_extra').hide();
    }
});

    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);