    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm', 'options' => ['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q40")->textarea(['rows' => 5]); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q41")->textarea(['rows' => 5]); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q42")->textarea(['rows' => 5]); ?>
                <?= $form->field($questionGroupModel, 'q42_file')->fileInput()->label(false); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($questionGroupModel, "q43")->textarea(['rows' => 5]); ?>
                <?= $form->field($questionGroupModel, 'q43_file')->fileInput()->label(false); ?>
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
                        'onclick' => "$('#surveyForm').submit(); $('#current_page_form_group').find('small').text($questionGroupModel->page+1);"
                    ]
                ); ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>

<?php
$this->registerJs("$('#current_page_form_group').find('small').text('".$questionGroupModel->page." (ETAPA 2)');", \yii\web\View::POS_END);