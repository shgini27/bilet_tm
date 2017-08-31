<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CulturalPlaceTranslation */

$this->title = Yii::t('app', 'Update Cultural Place Translation: {nameAttribute}', [
    'nameAttribute' => $model->cultural_place_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultural Place Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cultural_place_id, 'url' => ['view', 'cultural_place_id' => $model->cultural_place_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="cultural-place-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
