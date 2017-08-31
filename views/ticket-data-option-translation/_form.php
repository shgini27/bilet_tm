<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketDataOptionTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-data-option-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_option_data_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
