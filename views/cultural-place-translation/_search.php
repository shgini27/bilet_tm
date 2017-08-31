<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchCulturalPlaceTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cultural-place-translation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'cultural_place_id') ?>

    <?= $form->field($model, 'language_id') ?>

    <?= $form->field($model, 'place_name') ?>

    <?= $form->field($model, 'cultural_place_description') ?>

    <?= $form->field($model, 'place_city') ?>

    <?php // echo $form->field($model, 'place_street') ?>

    <?php // echo $form->field($model, 'work_hour') ?>

    <?php // echo $form->field($model, 'off_day') ?>

    <?php // echo $form->field($model, 'bus') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
