<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\checkbox\CheckboxX;
?>

<div class="footerSignUp">		
    <div class="parallax">
        <div class="parallax-pattern-overlay">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <h5 class="display-2"><?= \Yii::t('app', 'SIGN UP FOR NEWS'); ?></h5>
                        <h6 class="learn">
                                    <?= \Yii::t('app', 'to get more info about news and acivities in the city, just type your e-mail at the bottom'); ?>
                        </h6>
                        <br>
						<fieldset class="form-group">
							<?php $form = ActiveForm::begin(['id' => 'subscribe-form']); ?>

								<?= $form->field($model, 'email', [
												'addon' => [
													'append' => [
														'content' => Html::submitButton('<i class="fa fa-sign-in"></i>', ['class'=>'btn btn-default', 'name' => 'subscribe-button']), 
															'asButton' => true
														]
													]
												])->textInput(['placeholder' => 'email@mail.ru'])->label(false); 
								?>
								
								<?= $form->field($model, 'agree', ['template' => "<div class=\"col-md-offset-3 col-md-6 white\">{input} <br />{label}</div>\n<div class=\"col-md-8\">{error}</div>"])->widget(CheckboxX::classname(), [])->label(\Yii::t('app', 'I agree with all terms and condition')) ?>

							<?php ActiveForm::end(); ?>
						</fieldset>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>