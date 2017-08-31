<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CulturalPlaceTranslation */

$this->title = $model->cultural_place_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultural Place Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="cultural-place-translation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'cultural_place_id' => $model->cultural_place_id, 'language_id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'cultural_place_id' => $model->cultural_place_id, 'language_id' => $model->language_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cultural_place_id',
            'language_id',
            'place_name',
            'cultural_place_description:ntext',
            'place_city',
            'place_street',
            'work_hour',
            'off_day',
            'bus',
        ],
    ]) ?>

</div>
