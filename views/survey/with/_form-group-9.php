    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?php
                    $q24_options = explode(';', $questionGroupModel->attributeLabels()['q24_options']);
                    echo $form->field($questionGroupModel, "q24")->dropDownList($q24_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-7">
                <?= $form->field($questionGroupModel, "q25")->textInput(['placeholder' => 'Ex: 40 horas']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12">
                     <?php
                        $q25_extra_options = explode(';', $questionGroupModel->attributeLabels()['q25_extra_options']);
                        echo $form->field($questionGroupModel, "q25_extra")->dropDownList($q25_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                    ?>
                </div>
                <div id="q25_extra1" style="display:none;">
                    <div class="col-sm-3">
                        <?= $form->field($questionGroupModel, "q25_extra1")->textInput(['placeholder' => 'Outro cargo aqui'])->label('Outro cargo'); ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $q26_options = explode(';', $questionGroupModel->attributeLabels()['q26_options']);
                    echo $form->field($questionGroupModel, "q26")->dropDownList($q26_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
            <div id="q26_extra" style="display:none;">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra")->textInput(['placeholder' => 'Escreva aqui o nome da instituição'])->label('Nome da instituição'); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra1")->textInput(['placeholder' => 'Escreva aqui a função exercida'])->label('Função'); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra2")->textInput(['placeholder' => 'Escreva aqui a carga horária'])->label('Carga horária (em horas semanais)'); ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra3")->textInput(['placeholder' => 'Escreva aqui o nome da instituição'])->label('Nome da instituição'); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra4")->textInput(['placeholder' => 'Escreva aqui a função exercida'])->label('Função'); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra5")->textInput(['placeholder' => 'Escreva aqui a carga horária'])->label('Carga horária (em horas semanais)'); ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra6")->textInput(['placeholder' => 'Escreva aqui o nome da instituição'])->label('Nome da instituição'); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra7")->textInput(['placeholder' => 'Escreva aqui a função exercida'])->label('Função'); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($questionGroupModel, "q26_extra8")->textInput(['placeholder' => 'Escreva aqui a carga horária'])->label('Carga horária (em horas semanais)'); ?>
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
$("#formgroup9-q26").on("change", function(){
    if($(this).val() !== '0') 
    {
        $('#q26_extra').show();
    }
    else
    {
    $('#q26_extra').hide();
    }
});
$("#formgroup9-q25_extra").on("change", function(){
    if($(this).val() === '7') 
    {
        $('#q25_extra1').show();
    }
    else
    {
    $('#q25_extra1').hide();
    }
});

    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);