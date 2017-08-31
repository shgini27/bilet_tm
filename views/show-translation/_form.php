<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShowTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="show-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'show_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
