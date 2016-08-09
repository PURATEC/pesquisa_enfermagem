    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <?php
            $q1_options = explode(';', $questionGroupModel->attributeLabels()['q1_options']);
            echo $form->field($questionGroupModel, "q1")->radioList($q1_options, ['separator' => "<br>"]); 
        ?>         
        
        <div id="q1_extra" style="display:none;">
            <?= $form->field($questionGroupModel, "q2")->textInput(['placeholder' => 'Ex: 2005']); ?>

            <?= $form->field($questionGroupModel, "q3")->textarea(['placeholder' => 'Ex: A disciplina foi removida porque ...', 'rows' => 6]); ?>
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
                    'javascript:void(0);',
                    ['class' => 'btn btn-success btn-block', 'onclick' => "$('#surveyForm').yiiActiveForm('submitForm');"]
                ); ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>


<?php
$js1 = <<<'EOD'
$("#formgroup1-q1").on("change", function(){
    if($('input[name="FormGroup1[q1]"]:checked', '#surveyForm').val() !== '0')
    {
        $('#q1_extra').show();
        $('#formgroup1-q2').val('');
        $('#formgroup1-q3').val('');
    }
    else
    {
        $('#q1_extra').hide();
        $('#formgroup1-q2').val('0');
        $('#formgroup1-q3').val('0');
    }
});
    
EOD;

yii\jui\JuiAsset::register($this);
$this->registerJs($js1);