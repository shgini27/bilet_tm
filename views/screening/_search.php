<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchScreening */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="screening-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'auditorium_id') ?>

    <?= $form->field($model, 'show_id') ?>

    <?= $form->field($model, 'screening_start') ?>

    <?= $form->field($model, 'start_hour') ?>

    <?php // echo $form->field($model, 'start_min') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
