<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShowCategoryTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="show-category-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'show_category_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
