<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'show_id')->hiddenInput()->label(false); ?>
	
	<?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>
	
    <?= $form->field($model, 'name')->hiddenInput()->label($model->name); ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'star_count')->dropDownList(['options' => ['0', '1', '2', '3', '4', '5']]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>