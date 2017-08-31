<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleCategoryTranslation */

$this->title = 'Update Article Category Translation: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Article Category Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->article_category_id, 'url' => ['view', 'article_category_id' => $model->article_category_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="article-category-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
