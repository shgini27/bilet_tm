<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SeatReserved */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seat-reserved-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seat_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'screening_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reservation_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'row')->textInput() ?>

    <?= $form->field($model, 'colum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
