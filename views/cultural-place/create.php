<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CulturalPlace */

$this->title = Yii::t('app', 'Create Cultural Place');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultural Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="cultural-place-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
