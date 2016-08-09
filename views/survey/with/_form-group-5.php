    <div class="panel-body">
        
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'surveyForm']); ?>

        <?= $form->field($questionGroupModel, "page")->hiddenInput()->label(false); ?>
        
        <div class="row">
            <div class="col-sm-12">
                <?php
                echo $form->field($questionGroupModel, "q13")->widget(\kartik\slider\Slider::classname(), [
                    'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                    'handleColor' => \kartik\slider\Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'handle' => 'triangle',
                        'tooltip' => 'always'
                    ]
                ]); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?php
                echo $form->field($questionGroupModel, "q14")->widget(\kartik\slider\Slider::classname(), [
                    'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                    'handleColor' => \kartik\slider\Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'handle' => 'triangle',
                        'tooltip' => 'always'
                    ]
                ]); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?php
                echo $form->field($questionGroupModel, "q15")->widget(\kartik\slider\Slider::classname(), [
                    'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                    'handleColor' => \kartik\slider\Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'handle' => 'triangle',
                        'tooltip' => 'always'
                    ]
                ]); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?php
                echo $form->field($questionGroupModel, "q16")->widget(\kartik\slider\Slider::classname(), [
                    'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                    'handleColor' => \kartik\slider\Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'handle' => 'triangle',
                        'tooltip' => 'always'
                    ]
                ]); ?>
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