    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q33_options = explode(';', $questionGroupModel->attributeLabels()['q33_options']);
                    echo $form->field($questionGroupModel, "q33")->dropDownList($q33_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q33_extra" class="row" style="display:none;">
            <div class="col-sm-12"> 
                <div class="col-sm-12">
                    
                    <?= \yii\helpers\Html::label('16.1 Em quais revistas?') ?>
                    <br>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-8">
                                <?php
                                    $q33_extra_options = explode(';', $questionGroupModel->attributeLabels()['q33_extra_options']);
                                    echo $form->field($questionGroupModel, "q33_extra")->dropDownList($q33_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Revista');
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q33_extra1")->textInput(['placeholder' => 'Ex: 4'])->label('Quantidade:'); ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $form->field($questionGroupModel, "q33_extra2")->dropDownList($q33_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Revista');
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q33_extra3")->textInput(['placeholder' => 'Ex: 4'])->label('Quantidade:'); ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $form->field($questionGroupModel, "q33_extra4")->dropDownList($q33_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Revista');
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($questionGroupModel, "q33_extra5")->textInput(['placeholder' => 'Ex: 4'])->label('Quantidade:'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    echo $form->field($questionGroupModel, "q34")->dropDownList($q33_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q34_extra" style="display:none;">
            <div class="col-sm-12">
                <hr>
                <?= \yii\helpers\Html::label('16.3 - Em quais áreas?') ?>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?php $q34_extra_options = explode(';', $questionGroupModel->attributeLabels()['q34_extra_options']); ?>
                    <?= $form->field($questionGroupModel, "q34_extra")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra1")->textInput(['placeholder' => 'Ex: 4'])->label('<br>'); ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra2")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra3")->textInput(['placeholder' => 'Ex: 4'])->label('<br>'); ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra4")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra5")->textInput(['placeholder' => 'Ex: 4'])->label('<br>'); ?>
                </div>
            </div>
            
            <div class="col-sm-12">
                <hr>
                <?= \yii\helpers\Html::label('16.3 - Em quais Revistas?') ?>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra6")->dropDownList($q33_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra7")->textInput(['placeholder' => 'Ex: 4'])->label('Total de artigos'); ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q34_extra8")->dropDownList($q33_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra9")->textInput(['placeholder' => 'Ex: 4'])->label('Total de artigos'); ?>
                </div>
            </div>
            <div class="col-sm-12">
               <div class="col-sm-4">
                    <?php
                        echo $form->field($questionGroupModel, "q34_extra10")->dropDownList($q33_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');
                    ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($questionGroupModel, "q34_extra11")->textInput(['placeholder' => 'Ex: 4'])->label('Total de artigos'); ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?php
                    echo $form->field($questionGroupModel, "q35")->dropDownList($q33_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div id="q35_extra" style="display:none;">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <?php
                        echo $form->field($questionGroupModel, "q35_extra")->dropDownList($q33_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="q35_extra_livros" style="display:none;">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra1")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                        </div>
                        <div class="col-sm-4">
                            <?php $q35_extra_options = explode(';', $questionGroupModel->attributeLabels()['q35_extra_options']); ?>
                            <?= $form->field($questionGroupModel, "q35_extra1")->dropDownList($q35_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');  ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra2")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra3")->dropDownList($q35_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');  ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra4")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra5")->dropDownList($q35_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');  ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <?php
                        echo $form->field($questionGroupModel, "q35_extra6")->dropDownList($q33_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="q35_extra_capitulos" style="display:none;">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra7")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra8")->dropDownList($q35_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');  ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra9")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra10")->dropDownList($q35_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');  ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra11")->dropDownList($q34_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Área');  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($questionGroupModel, "q35_extra12")->dropDownList($q35_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO'])->label('Quantidade');  ?>
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
$("#formgroup13-q33").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q33_extra').show();
    }
    else
    {
    $('#q33_extra').hide();
    }
});
$("#formgroup13-q34").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q34_extra').show();
    }
    else
    {
    $('#q34_extra').hide();
    }
});
$("#formgroup13-q35").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q35_extra').show();
    }
    else
    {
    $('#q35_extra').hide();
    }
});
$("#formgroup13-q35_extra").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q35_extra_livros').show();
    }
    else
    {
    $('#q35_extra_livros').hide();
    }
});
$("#formgroup13-q35_extra6").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q35_extra_capitulos').show();
    }
    else
    {
    $('#q35_extra_capitulos').hide();
    }
});

    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);