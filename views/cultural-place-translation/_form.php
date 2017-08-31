<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CulturalPlaceTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cultural-place-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cultural_place_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cultural_place_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'place_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place_street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_hour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'off_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
