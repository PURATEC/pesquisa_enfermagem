    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $q13_options = [0,1,2,3,4,5,6,7,8,9,10];
                    echo $form->field($questionGroupModel, "q13")->dropDownList($q13_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
               <?= $form->field($questionGroupModel, "q14")->dropDownList($q13_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q15")->dropDownList($q13_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q16")->dropDownList($q13_options, ['prompt' => 'SELECIONAR UMA OPÇÃO']); ?>
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