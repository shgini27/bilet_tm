<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchReservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reservation_type_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'screening_id') ?>

    <?= $form->field($model, 'reserved') ?>

    <?php // echo $form->field($model, 'ext_order_id') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'reserv_date') ?>

    <?php // echo $form->field($model, 'reserv_hour') ?>

    <?php // echo $form->field($model, 'reserv_min') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
