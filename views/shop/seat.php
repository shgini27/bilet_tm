<?php

/* @var $this yii\web\View */

use kartik\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$url_place = 'site/list';
$url_show_time = 'about/about';
$order = Yii::$app->session->get('order');

$order->emptyArray();
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
$sold_seats = $order->getSoldSeats();
$s_s_size = sizeof($sold_seats['col']);
$auditorium_name = $order->getAuditoriumName();

?>

<!-- main body contents starts here-->
<div class="container" id="seatContainer">
    <div class="row" style="margin-top: 5%;">
        <!--Left Column *********************************************-->
        <div class="col-md-3">
            <div class="col-md-12" style="background-color: whitesmoke;
                 padding-top: 5%;padding-bottom: 15%;">
                <div class="col-md-12 img-rounded" 
                     style="background-color: white;padding-top: 5%;padding-bottom: 15%;">
                    <h4 class="text-center"><?= \Yii::t('app', 'SHOW'); ?></h4>
					<u><a href="<?= Url::to([$url_show_time, 'id' => $cultural_place_id])?>"><?= Html::encode($show_name); ?></a></u><br><br>
                </div>

                <a href="<?= Url::to([$url_place, 'id' => $cultural_place_category]); ?>">
                    <div class="col-md-12 text-center ticketRightCol img-rounded"><?= Html::encode($place_name); ?></div>
                </a>
                <a href="<?= Url::to([$url_show_time, 'id' => $cultural_place_id]); ?>">
					
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
		
			<?php if($error): ?>
			<div class="col-md-offset-1 col-md-10 text-center">
				<h5 style="color: red;"><?= \Yii::t('app', 'You can not make a payment if you do not choose any seat! Please choose one'); ?></h5>
			</div>
			<?php endif; ?>
			
			<?php $form = ActiveForm::begin(['id' => 'seat-form']); ?>
			
            <div class="col-md-12" style="background-color: whitesmoke;">
                <h3 class="text-center"><?= \Yii::t('app', 'Please Choose a seat'); ?></h3>
                <!--Stage********************************************************************-->
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 img-rounded" style="background-color: white;">
                        <div class="col-md-offset-1 col-md-9 text-center" 
                             style="background-color: whitesmoke;margin-top: 5%;
                             padding-top: 2%;padding-bottom: 2%;">
                            <?= \Yii::t('app', 'Stage'); ?>
                        </div>
                        <div class="col-md-offset-1 col-md-10" 
                             style="background-color: black;margin-top: 0.5%;margin-bottom: 5%;
                             padding-top: 0.5%;padding-bottom: 0.5%;border-radius: 4px;">
                        </div>
						
                       <!--Seats selection test part************************************************-->
					   <div class="col-md-12 fuselage">
                           <div class="plane"> <!--class="plane" 'template' => "<div class=\"col-md-offset-3 col-md-6 white\">{input} <br />{label}</div>\n<div class=\"col-md-8\">{error}</div>",-->
                               <div class="col-md-12 text-center">
									
									   <?php
									   $label_col = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
									   for($row = 0; $row < $seat_row; $row++): ?>
										 <div class="seats">  
										   <?php for($col = 0; $col < $seat_col; $col++):
											   $class = Html::TYPE_SUCCESS;//vip
											   $vip = '';
											   $template = "<div class=\"checkbox-inline\">{input} <br />{label}</div>\n<div class=\"col-md-8\">{error}</div>";
											   $value = ($row + 1).'/'.($col + 1);
											   
											   $label = ($row + 1) .($label_col[$col]);
											   
											   $disabled = false;
											   for($s_s = 0; $s_s < $s_s_size; $s_s++):
												   if($sold_seats['row'][$s_s] === ($row + 1) and $sold_seats['col'][$s_s] === ($col + 1)){
													   $disabled = true;
													   $class = Html::TYPE_DANGER;
													   $label = 'XX';
												   }
											   endfor; ?>
												
											   <?= $form->field($model, 'seats2[]')
																				->checkbox(['value' => $value, 'disabled' => $disabled, 'id' => $label, 'class' => 'inputs', 'template' => $template])
																				->label(Html::bsLabel($label, $class), ['for' => $label]); 
												?>
											<?php endfor; ?> 
										 </div>
										<?php endfor; ?>
									
                               </div>
                           </div>
                       </div>
					   
					    <!--Seat selection***************************-->
						<!--<div class="col-md-12 fuselage">
                           <div class="plane">
                               <div class="col-md-12 text-center">
									
									   <?php
									   $label_col = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
									   for($row = 0; $row < $seat_row; $row++):
										   $label = [];
										   
										   for($col = 0; $col < $seat_col; $col++):
											   $label[($row + 1).'/'.($col + 1)] = ($row + 1) .':'.($label_col[$col]);
										   endfor;
									   ?>
										   <div id="seat_row_<?= ($row + 1); ?>">
											   <?= $form->field($model, 'seats')->inline()->checkboxList($label, ['unselect' => null, 'style' => 'color:red;'])->label(false); ?>
										   </div>
									   <?php
									   endfor;
									   ?>
                               </div>
                           </div>
                       </div> -->
					</div>
                </div>
				
				<!--<div class="col-md-offset-3 col-md-6 white">
						{input} <br />
						{label}
					</div>
					<div class="col-md-8">
						{error}
					</div>-->
					
                <!--Seats explanation *******************************-->
                <div class="row" style="background-color: white;margin-top: 2%;">
					<div class="col-md-offset-2 col-md-8" style="padding-top: 5%;">
						<div class="col-md-4 text-center">
								<b><?= Html::bsLabel(\Yii::t('app', 'regular') .' '. $regular_price .' '. \Yii::t('app', 'TMM'), Html::TYPE_SUCCESS); ?></b>
						</div>
						<div class="col-md-4 text-center">
								<b><?= Html::bsLabel(\Yii::t('app', 'vip') .' '. $vip_price .' '. \Yii::t('app', 'TMM'), Html::TYPE_WARNING); ?></b>
						</div>
						<div class="col-md-4 text-center">
								<?= Html::bsLabel(\Yii::t('app', 'Sold XX'), Html::TYPE_DANGER); ?>
						</div>
					</div>
                </div>
            </div>

			<!--Buttons "NEXT" and "BACK"-->
            <div class="col-md-12" style="margin-top: 5%;padding-right: 0;">
					<?= Html::submitButton(\Yii::t('app', 'Next'), ['class' => 'btn btn-default pull-right', 'style' => 'margin-left: 4%;', 'name' => 'seat-button']); ?>
					<?= Html::a(\Yii::t('app', 'Back'), ['shop/buy-ticket', 'id' => $show_id], ['class'=>'btn btn-default pull-right']); ?>
				
            </div>
			
			<?php ActiveForm::end(); ?>
			
        </div>
    </div>

    <hr>
</div> 
<!-- /END OF container ******************************************************-->