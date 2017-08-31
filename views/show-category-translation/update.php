<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShowCategoryTranslation */

$this->title = 'Update Show Category Translation: ' . $model->show_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Show Category Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->show_category_id, 'url' => ['view', 'show_category_id' => $model->show_category_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="show-category-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
