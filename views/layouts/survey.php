<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
        <div class="container">
            <div id="cabecalho"> 
                <div id="cab_logo">
                    <?= Html::img('@web/img/logo.png', ['width' => '130px','height' => '120px']);?>
                </div>
                <div id="cab_conteudo">
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
            <p class="pull-left">&copy; PURATEC <?= date('Y') ?></p>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
