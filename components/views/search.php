<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;
?>
<div class="navbar-form">

	<?php $form = ActiveForm::begin(['id' => 'search-form'],
									['role' => 'search',]); ?>
		
		<div class="input-group pull-right">
			
			<?= $form->field($model, 'search', [
												'addon' => [
													'append' => [
														'content' => Html::submitButton('<i class="fa fa-search"></i>', ['class'=>'btn btn-default', 'name' => 'search-button']), 
															'asButton' => true
														]
													]
												])->textInput(['placeholder' => \Yii::t('app', 'Search')])->label(false); 
			?>

		</div>
		
	<?php ActiveForm::end(); ?>
</div>