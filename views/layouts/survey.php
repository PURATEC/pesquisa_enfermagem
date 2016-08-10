<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">    
        
        <?php
        if(! Yii::$app->user->isGuest):
        NavBar::begin([
            'brandLabel' => 'História da Enfermagem',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                Yii::$app->user->isGuest ? (
                    ['label' => 'Acessar', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Sair (' . Yii::$app->user->identity->email . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        endif;?>
        
        
        <div class="container">
            <div id="header"> 
                <div id="logo">
                    <?= Html::img('@web/img/logo.png', ['width' => '130px','height' => '120px']);?>
                </div>
                <div id="header_content">
                    <h4>Rastreamento no Ensino de História da Enfermagem no Estado de São Paulo
                            Escola de Enfermagem de Ribeirão Preto - EERP
                    </h4>
                </div> 
            </div>
            <hr>
        </div>
        <div id="main-content" class="container">
            <?= $content ?>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <?= Html::img('@web/img/logo_puratec.png', ['width'=>'60', 'height' => '60', 'class' => 'pull-left']) ?>
            <p class="pull-left" style="margin-top: 20px;">&nbsp; &copy; PURATEC <?= date('Y') ?></p>
            <p class="pull-right" style="margin-top: 10px;">
                <small><strong>Levantamento de requisitos:</strong> André Freitas</small> <br>
                <small><strong>Modelagem/Projeto/Desenvolvimento/Testes:</strong> PURATEC</small> <br>
            </p>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
