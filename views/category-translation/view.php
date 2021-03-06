<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryTranslation */

$this->title = $model->category_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="category-translation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'category_id' => $model->category_id, 'language_id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'category_id' => $model->category_id, 'language_id' => $model->language_id], [
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
            'category_id',
            'language_id',
            'category_name',
        ],
    ]) ?>

</div>
