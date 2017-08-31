<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$url_place = 'site/list';
$url_show_time = 'about/about';

$order = Yii::$app->session->get('order');
$cultural_place_id = $order->getCulturalPlaceId();
$cultural_place_category = $order->getCulturalPlaceCategory();
$show_id = $order->getShowId();
$show_name = $order->getShowName();
$show_date = Yii::$app->formatter->asDate($order->getShowDate(), 'php:d.m.Y');
$show_time = $order->getShowTime();
$place_name = $order->getPlaceName();


?>

<!-- main body contents starts here-->
<div class="container" style="margin-top: 5%;">
    <div class="row" style="margin-top: 5%;">
        <!--Left Column *********************************************-->
        <div class="col-md-3">
			<div class="col-md-12" style="background-color: whitesmoke;
                 padding-top: 5%;padding-bottom: 15%;">
                <div class="col-md-12 img-rounded" 
                     style="background-color: white;padding-top: 5%;padding-bottom: 15%;">
                    <h4 class="text-center"><?= \Yii::t('app', 'SHOW'); ?></h4>
                    <u><a href="<?= Url::to([$url_show_time, 'id' => $cultural_place_id]); ?>"><?= Html::encode($show_name); ?></a></u><br><br>
                </div>

                <a href="<?= Url::to([$url_place, 'id' => $cultural_place_category]); ?>">
                    <div class="col-md-12 text-center ticketRightCol img-rounded"><?= Html::encode($place_name); ?></div>
                </a>
                <a href="<?= Url::to([$url_show_time, 'id' => $cultural_place_id])?>">
                    <div class="col-md-12 text-center ticketRightCol img-rounded">
						<?= Html::encode($show_date); ?><br />
						<?= Html::encode($show_time); ?>
					</div>
                </a>
                <div class="col-md-12 text-center ticketRightCol img-rounded" 
                     style="background-color: black;"><?= \Yii::t('app', 'Seat'); ?></div>
					 
                <div class="col-md-12 text-center ticketRightCol img-rounded" 
                     style="background-color: black;"><?= \Yii::t('app', 'Price'); ?></div>
            </div>
        </div>
        <!--Right Column *********************************************-->
        <div class="col-md-9">
            <h3 class="text-center"><?= \Yii::t('app', 'Buy Tickets Online'); ?></h3>
            <h4 class="text-center" style="margin-top:6%;"><?= Html::encode($place_name); ?></h4>

            <div class="col-md-12 ticketOnline">
				<div class="col-md-12" style="margin-top: 2%;">
					<div class="col-md-3"><p><?= \Yii::t('app', 'Show name'); ?></p></div>
                    <div class="col-md-8"><p><b class="ticketTime"><?= Html::encode($show_name); ?></b></div>
                </div>
				<div class="col-md-12" style="margin-top: 2%;">
					<div class="col-md-3"><p><?= \Yii::t('app', 'Start Time'); ?></p></div>
                    <div class="col-md-8"><p><time class="ticketTime"><b> <?= Html::encode($show_time); ?></b></time></div>
                </div>
            </div>
			
            <div class="col-md-12" style="padding-top: 5%;">
                <p>
                    <?= \Yii::t('app', 'By pressing "Next" button, you are agree with user terms'); ?>
                </p>
            </div>
				<?= Html::a(\Yii::t('app', 'Next'), ['shop/seat'], ['class'=>'btn btn-default pull-right']); ?>
        </div>
    </div>

    <hr>
</div> 
<!-- /END OF container ******************************************************-->