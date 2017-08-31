<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShowCategory */

$this->title = 'Update Show Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Show Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="show-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
