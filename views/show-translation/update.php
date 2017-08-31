<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShowTranslation */

$this->title = Yii::t('app', 'Update Show Translation: {nameAttribute}', [
    'nameAttribute' => $model->show_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Show Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->show_id, 'url' => ['view', 'show_id' => $model->show_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="show-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
