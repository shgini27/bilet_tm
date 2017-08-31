<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Seat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'auditorium_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'row')->textInput() ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
