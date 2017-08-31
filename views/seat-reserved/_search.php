<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchSeatReserved */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seat-reserved-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'seat_id') ?>

    <?= $form->field($model, 'screening_id') ?>

    <?= $form->field($model, 'reservation_id') ?>

    <?= $form->field($model, 'row') ?>

    <?php // echo $form->field($model, 'colum') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
