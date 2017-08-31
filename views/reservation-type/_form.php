<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservationType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reservation_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
