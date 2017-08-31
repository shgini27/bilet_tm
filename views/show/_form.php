<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Show */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="show-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'show_category_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cultural_place_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'begin_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'start_hour')->textInput() ?>

    <?= $form->field($model, 'start_min')->textInput() ?>

    <?= $form->field($model, 'end_hour')->textInput() ?>

    <?= $form->field($model, 'end_min')->textInput() ?>

    <?= $form->field($model, 'image_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
