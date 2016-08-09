    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="col-sm-6">
            <?= $form->field($questionGroupModel, "q1")->textInput(['placeholder' => 'Ex: Instituição exemplo']); ?>
        </div>
        
        <div class="col-sm-3">
            <?= $form->field($questionGroupModel, "q1_extra")->textInput(['placeholder' => 'Ex: 2005']); ?>
        </div>
    </div>
    
    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-6">
                <?= \yii\helpers\Html::a(
                    "<i class='fa fa-arrow-circle-o-left fa-3x'></i> <h4>ESCOLHER OUTRA PESQUISA</h4>", 
                    ['pre-create?person_id='.$person_id], 
                    ['class' => 'btn btn-danger btn-block']
                ); ?>
            </div>
            <div class="col-sm-6">
                <?= \yii\helpers\Html::a(
                    "<i class='fa fa-check-circle-o fa-3x'></i> <h4>SALVAR</h4>",
                    'javascript:void(0);', [
                        'class' => 'btn btn-success btn-block', 
                        'onclick' => "$('#surveyForm').submit(); "
                    ]
                ); ?>
            </div>
        </div>  
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>

<?php
$this->registerJs("$('#current_page_form_group').find('small').text('".$questionGroupModel->page." (ETAPA 1)');", \yii\web\View::POS_END);
