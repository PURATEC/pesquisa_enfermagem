    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q37_options = explode(';', $questionGroupModel->attributeLabels()['q37_options']);
                    echo $form->field($questionGroupModel, "q37")->dropDownList($q37_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q37_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                $q37_extra_options1 = explode(';', $questionGroupModel->attributeLabels()['q37_extra_options1']);
                                echo $form->field($questionGroupModel, "q37_extra")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                $q37_extra_options2 = explode(';', $questionGroupModel->attributeLabels()['q37_extra_options2']);
                                echo $form->field($questionGroupModel, "q37_extra1")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q37_extra2")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q37_extra3")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q37_extra4")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q37_extra5")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q37_extra6")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q37_extra7")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q37_extra8")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    echo $form->field($questionGroupModel, "q38")->dropDownList($q37_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q38_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra1")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra2")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra3")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra4")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra5")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra6")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra7")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q38_extra8")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    echo $form->field($questionGroupModel, "q39")->dropDownList($q37_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q39_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra1")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra2")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra3")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra4")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra5")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra6")->dropDownList($q37_extra_options1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra7")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade Em andamento');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                                echo $form->field($questionGroupModel, "q39_extra8")->dropDownList($q37_extra_options2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Concluídos');
                            ?>
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
$("#formgroup15-q37").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q37_extra').show();
    }
    else
    {
    $('#q37_extra').hide();
    }
});
$("#formgroup15-q38").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q38_extra').show();
    }
    else
    {
    $('#q38_extra').hide();
    }
});
$("#formgroup15-q39").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q39_extra').show();
    }
    else
    {
    $('#q39_extra').hide();
    }
});

    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);