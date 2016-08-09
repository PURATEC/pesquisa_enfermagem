    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        <?= $form->field($questionGroupModel, 'q27')->hiddenInput(['value'=> '1'])->label(false); ?>
        
        <div class="row">
            <div class="col-sm-12">
                <?= \yii\helpers\Html::label('10. Idiomas') ?>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-8">
                    <?php
                        $q27_extra_options = explode(';', $questionGroupModel->attributeLabels()['q27_extra_options']);
                        echo $form->field($questionGroupModel, "q27_extra1")->dropDownList($q27_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                    ?>
                </div>
                <div class="col-sm-8">
                    <?php
                        echo $form->field($questionGroupModel, "q27_extra2")->dropDownList($q27_extra_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                    ?>
                </div>
                <div class="col-sm-8">
                    <?= $form->field($questionGroupModel, "q27_extra3")->textInput(['placeholder' => 'Ex: Outro idioma']); ?>
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