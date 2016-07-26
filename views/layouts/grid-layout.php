<?php
 
use yii\helpers\Url; 
?>

<?php $this->beginContent('@app/views/layouts/survey.php'); ?>
    <ul class="nav nav-tabs">
        <li id='custom-group' class='li_form_navs'><a href="<?= Url::to(['/survey/index']); ?>">Pesquisas respondidas</a></li>
        <li id='custom-model' class='li_form_navs'><a href="<?= Url::to(['/survey/admin']); ?>">Disparar emails</a></li>
    </ul>
    <br>
    <?= $content ?>
<?php $this->endContent(); ?>