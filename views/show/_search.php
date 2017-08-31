<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchShow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="show-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'show_category_id') ?>

    <?= $form->field($model, 'cultural_place_id') ?>

    <?= $form->field($model, 'begin_date') ?>

    <?= $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'start_hour') ?>

    <?php // echo $form->field($model, 'start_min') ?>

    <?php // echo $form->field($model, 'end_hour') ?>

    <?php // echo $form->field($model, 'end_min') ?>

    <?php // echo $form->field($model, 'image_name') ?>

    <?php // echo $form->field($model, 'show_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
