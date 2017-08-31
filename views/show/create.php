<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Show */

$this->title = Yii::t('app', 'Create Show');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shows'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="show-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
