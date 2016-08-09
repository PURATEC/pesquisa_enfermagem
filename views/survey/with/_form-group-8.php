    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <div class="row">
            <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
                <?php
                    $q20_options = explode(';', $questionGroupModel->attributeLabels()['q20_options']);
                    echo $form->field($questionGroupModel, "q20")->dropDownList($q20_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
            <div id="q20_extra" style="display:none;">
                <div class="col-sm-5">
                    <?= $form->field($questionGroupModel, "q20_extra")->textInput(['placeholder' => 'Ex: Bacharel e Licenciado em Enfermagem'])->label("<br>"); ?>
                </div>
            </div>
            <div class="col-sm-3">
                <?= $form->field($questionGroupModel, "q20_extra2")->textInput(['placeholder' => 'Ex: 2005']); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
                <?php
                    $q21_options = explode(';', $questionGroupModel->attributeLabels()['q21_options']);
                    echo $form->field($questionGroupModel, "q21")->dropDownList($q21_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
            <div id="q21_extra" style="display:none;">
                <div class="col-sm-5">
                    <?= $form->field($questionGroupModel, "q21_extra")->textInput(['placeholder' => 'Ex: Bacharel e Licenciado em Enfermagem'])->label("<br>"); ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($questionGroupModel, "q21_extra2")->textInput(['placeholder' => 'Ex: 2005']); ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <?php
                    $q22_options = explode(';', $questionGroupModel->attributeLabels()['q22_options']);
                    echo $form->field($questionGroupModel, "q22")->dropDownList($q22_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
            <div id="q22_extra" style="display:none;">
                <div class="col-sm-5">
                    <?= $form->field($questionGroupModel, "q22_extra")->textInput(['placeholder' => 'Ex: Especialização em enfermagem'])->label("<br>"); ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($questionGroupModel, "q22_extra2")->textInput(['placeholder' => 'Ex: 2005']); ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5">
                <?php
                    $q23_options = explode(';', $questionGroupModel->attributeLabels()['q23_options']);
                    echo $form->field($questionGroupModel, "q23")->checkboxList($q23_options, ['separator' => "<br><br><br>"]);
                ?>
            </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-5">
                        <?php
                            $q23_extra_sit_options = explode(';', $questionGroupModel->attributeLabels()['q23_extra_sit_options']);
                            echo $form->field($questionGroupModel, "q23_extra_sit")->dropDownList($q23_extra_sit_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                        ?>
                    </div>
                    <div class="col-sm-5">
                        <?= $form->field($questionGroupModel, "q23_extra")->textInput(['placeholder' => 'Ex: 2005']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <?php
                            $q23_extra2_sit_options = explode(';', $questionGroupModel->attributeLabels()['q23_extra2_sit_options']);
                            echo $form->field($questionGroupModel, "q23_extra2_sit")->dropDownList($q23_extra2_sit_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                        ?>
                    </div>
                    <div class="col-sm-5">
                        <?= $form->field($questionGroupModel, "q23_extra2")->textInput(['placeholder' => 'Ex: 2005']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <?php
                            $q23_extra3_sit_options = explode(';', $questionGroupModel->attributeLabels()['q23_extra3_sit_options']);
                            echo $form->field($questionGroupModel, "q23_extra3_sit")->dropDownList($q23_extra3_sit_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                        ?>
                    </div>
                    <div class="col-sm-5">
                        <?= $form->field($questionGroupModel, "q23_extra3")->textInput(['placeholder' => 'Ex: 2005']) ?>
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
$("#formgroup8-q20").on("change", function(){
    if($(this).val() === '3') 
    {
        $('#q20_extra').show();
    }
    else
    {
    $('#q20_extra').hide();
    }
});

$("#formgroup8-q21").on("change", function(){
    if($(this).val() === '1') 
    {
        $('#q21_extra').show();
    }
    else
    {
    $('#q21_extra').hide();
    }
});

$("#formgroup8-q22").on("change", function(){
    if($(this).val() === '1') 
    {
        $('#q22_extra').show();
    }
    else
    {
    $('#q22_extra').hide();
    }
});
    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);