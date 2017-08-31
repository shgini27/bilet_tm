<?php
use yii\bootstrap\Alert;
/* @var $this yii\web\View */

$today = Yii::$app->formatter->asDate('now', 'php:d-m-Y');
?>
<div class="site-index">
	<div class="row">
		<div class="col-md-12 text-center">
			<?php if($response_status === 5 or $response_status === '5'): ?>
				<?= Alert::widget([
                        'options' => ['class' => 'alert-dismissible alert-danger'],
                        'body' => \Yii::t('app', 'Permission Denied. Check with administration!')
                    ]) 
				?>
			<?php endif; ?>
		</div>
	</div>
</div>
