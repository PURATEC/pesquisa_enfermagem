    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?= $form->field($questionGroupModel, "q2")->textInput(['placeholder' => 'Ex: História da Enfermagem - HE005']); ?>
            </div>

            <div class="col-sm-4">
                <?php
                    $q3_options = explode(';', $questionGroupModel->attributeLabels()['q3_options']);
                    echo $form->field($questionGroupModel, "q3")->dropDownList($q3_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <?= $form->field($questionGroupModel, "q4")->textInput(['placeholder' => 'Ex: Departamento exemplo']); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-10">
                <?php
                    $q5_options = explode(';', $questionGroupModel->attributeLabels()['q5_options']);
                    echo $form->field($questionGroupModel, "q5")->dropDownList($q5_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <?php
                    $q5_extra_options = explode(';', $questionGroupModel->attributeLabels()['q5_extra_options']);
                    echo $form->field($questionGroupModel, "q5_extra")->dropDownList($q5_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
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
