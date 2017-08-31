<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$order = Yii::$app->session->get('order');

$username = $order->getName();
$cultural_place_id = $order->getCulturalPlaceId();
$cultural_place_category = $order->getCulturalPlaceCategory();
$show_id = $order->getShowId();
$show_name = $order->getShowName();
$show_time = $order->getShowTime();
$show_date = Yii::$app->formatter->asDate($order->getShowDate(), 'php:d.m.Y');
$place_name = $order->getPlaceName();
$regular_price = $order->getRegularPrice();
$vip_price = $order->getVipPrice();
$seat_id = $order->getSeatId();
$seat_row = $order->getSeatRow();
$seat_col =$order->getSeatCol();
$seat_value = $order->getSeatValue();
$seat_size = sizeof($seat_value);
$total = $order->getTotalAmount();
$auditorium_name = $order->getAuditoriumName();

?>

<!-- main body contents starts here-->
<div class="container" style="margin-top: 2%;">
    <div class="row" style="margin-top: 10%;margin-bottom:10%;">
		<div class="col-md-12 text-center">
			<h3><b><?= \Yii::t('app', 'Payment Success'); ?></b></h3>
		</div>
		
		<div class="col-md-12" style="margin-top: 3%;background-color: whitesmoke;">
			<div class="col-md-offset-2 col-md-8">
				<hr />
			</div>
			<div class="col-md-offset-2 col-md-2">
				<?= 
					'<h5><b>', \Yii::t('app', 'Place Name'), '</b></h5><br />',
					'<h5><b>', \Yii::t('app', 'Auditprium'), '</b></h5><br />',
					'<h5><b>', \Yii::t('app', 'Show Name'), '</b></h5><br />'; 
				?>
				<?php if($seat_size > 0): ?>
					<?= '<h5><b>', \Yii::t('app', 'Seats'), '</b></h5><br />'; ?>
				<?php endif; ?>
				<?=
					'<h5><b>', \Yii::t('app', 'Show date'), '</b></h5><br />',
					'<h5><b>', \Yii::t('app', 'Show Time'), '</b></h5><br />',
					'<h5><b>', \Yii::t('app', 'Regular price per Ticket'), '</b></h5><br />',
					'<h5><b>', \Yii::t('app', 'Vip price per Ticket'), '</b></h5><br />';
				?>
			</div>
			
			<div class="col-md-8">
				<?= 
					'<h5>: ', Html::encode($place_name), '</h5><br />',
					'<h5>: ', \Yii::t('app', 'Hall'), Html::encode($auditorium_name), '</h5><br />',
					'<h5>: ', Html::encode($show_name), '</h5><br />'; 
				?>
				<?php if($seat_size > 0): ?>
					<h5>: 
						<?php for($ss = 0; $ss < $seat_size; $ss++): ?>
							<?= Html::encode($seat_value[$ss]), ', '; ?>
						<?php endfor; ?>
					</h5><br />
				<?php endif; ?>
				<?=
					'<h5>: ', Html::encode($show_date), '</h5><br />',
					'<h5>: ', Html::encode($show_time), '</h5><br />',
					'<h5>: ', Html::encode($regular_price), '</h5><br />', 
					'<h5>: ', Html::encode($vip_price), '</h5><br />';
				?>
			</div>			
		</div>
	</div>
</div> <!-- /container -->

