    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q29_options = explode(';', $questionGroupModel->attributeLabels()['q29_options']);
                    echo $form->field($questionGroupModel, "q29")->dropDownList($q29_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q29_extra" class="row" style="display:none;">
            <div class="col-sm-12"> 
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-8">
                                <?php
                                    $q29_options_1 = explode(';', $questionGroupModel->attributeLabels()['q29_options_1']);
                                    echo $form->field($questionGroupModel, "q29_extra")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                    $q29_options_2 = explode(';', $questionGroupModel->attributeLabels()['q29_options_2']);
                                    echo $form->field($questionGroupModel, "q29_extra1")->dropDownList($q29_options_2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Função');
                                ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $form->field($questionGroupModel, "q29_extra2")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q29_extra3")->dropDownList($q29_options_2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Função');
                                ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $form->field($questionGroupModel, "q29_extra4")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q29_extra5")->dropDownList($q29_options_2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Função');
                                ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $form->field($questionGroupModel, "q29_extra6")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q29_extra7")->dropDownList($q29_options_2, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Função');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($questionGroupModel, "q29_extra8")->textarea(['placeholder' => 'Escreva aqui outros grupos ...', 'rows' => 5]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q30_options = explode(';', $questionGroupModel->attributeLabels()['q30_options']);
                    echo $form->field($questionGroupModel, "q30")->dropDownList($q30_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q30_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <?= yii\helpers\Html::label('Linhas de pesquisa'); ?>
                </div>

                <div class="col-sm-12"> 
                    <?= $form->field($questionGroupModel, "q30_extra")->textInput(['placeholder' => 'Insira aqui a linha de pesquisa'])->label(false); ?>
                </div>
                <div class="col-sm-12"> 
                    <?= $form->field($questionGroupModel, "q30_extra1")->textInput(['placeholder' => 'Insira aqui a linha de pesquisa'])->label(false); ?>
                </div>
                <div class="col-sm-12"> 
                    <?= $form->field($questionGroupModel, "q30_extra2")->textInput(['placeholder' => 'Insira aqui a linha de pesquisa'])->label(false); ?>
                </div>
                <div class="col-sm-12"> 
                    <?= $form->field($questionGroupModel, "q30_extra3")->textInput(['placeholder' => 'Insira aqui a linha de pesquisa'])->label(false); ?>
                </div>
                <div class="col-sm-12"> 
                    <?= $form->field($questionGroupModel, "q30_extra4")->textInput(['placeholder' => 'Insira aqui a linha de pesquisa'])->label(false); ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q31_options = explode(';', $questionGroupModel->attributeLabels()['q31_options']);
                    echo $form->field($questionGroupModel, "q31")->dropDownList($q31_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q31_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q31_extra")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        $q31_options_1 = explode(';', $questionGroupModel->attributeLabels()['q31_options_1']);
                        echo $form->field($questionGroupModel, "q31_extra1")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q31_extra2")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q31_extra3")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q31_extra4")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q31_extra5")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q31_extra6")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q31_extra7")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q31_extra8")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q31_extra9")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q31_extra10")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q31_extra11")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q32_options = explode(';', $questionGroupModel->attributeLabels()['q32_options']);
                    echo $form->field($questionGroupModel, "q32")->dropDownList($q32_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q32_extra" class="row" style="display:none;">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q32_extra")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra1")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra2")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q32_extra3")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra4")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra5")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q32_extra6")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra7")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra8")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q32_extra9")->dropDownList($q29_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra10")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos em andamento');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q32_extra11")->dropDownList($q31_options_1, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade de projetos concluídos');
                    ?>
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
$("#formgroup12-q29").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q29_extra').show();
    }
    else
    {
    $('#q29_extra').hide();
    }
});
$("#formgroup12-q30").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q30_extra').show();
    }
    else
    {
    $('#q30_extra').hide();
    }
});
$("#formgroup12-q31").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q31_extra').show();
    }
    else
    {
    $('#q31_extra').hide();
    }
});
$("#formgroup12-q32").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q32_extra').show();
    }
    else
    {
    $('#q32_extra').hide();
    }
});

    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);