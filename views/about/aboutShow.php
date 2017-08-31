<?php

/* @var $this yii\web\View */

//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\helpers\Url;
use app\models\Client;

$url = ['about/about', 'id' => $cultural_place->id];
switch($cultural_place->category_id){
	case 2:
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'MOVIE'), 'url' => ['site/list', 'id' => 2]];
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'ABOUT MOVIE'), 'url' => $url];
		
		$page_title = \Yii::t('app', 'Movies');
		break;
	case 3:
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'THEATRE'), 'url' => ['site/list', 'id' => 3]];
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'ABOUT THEATRE'), 'url' => $url];
		
		$page_title = \Yii::t('app', 'Scens');
		break;
	case 4:
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'EXHIBITION'), 'url' => ['site/list', 'id' => 4]];
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'ABOUT EXHIBITION'), 'url' => $url];
		
		$page_title = \Yii::t('app', 'Exibitions');
		break;
	case 5:
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'CONCERT'), 'url' => ['site/list', 'id' => 5]];
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'ABOUT CONCERT'), 'url' => $url];
		
		$page_title = \Yii::t('app', 'Concerts');
		break;
	case 6:
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'CHILDREN'), 'url' => ['site/list', 'id' => 6]];
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'ABOUT CHILDREN'), 'url' => $url];
		
		$page_title = \Yii::t('app', 'Children show');
		break;
	case 7:
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'SPORT'), 'url' => ['site/list', 'id' => 7]];
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'ABOUT SPORT'), 'url' => $url];
		
		$page_title = \Yii::t('app', 'Sport Avtivities');
		break;
}

$this->title = \Yii::t('app', 'ABOUT SHOW');
$this->params['breadcrumbs'][] = Html::encode($this->title);

date_default_timezone_set("Asia/Ashgabat");
$today = new DateTime("now");

if($show->start_min === 0){
	$min = '00';
}else{
	$min = $show->start_min;
}
						
if($show->start_hour < 10){
	$hour = '0'.$show->start_hour;
}else{
	$hour = $show->start_hour;
}
						
$da = substr($show->begin_date, 0, 10);
$date = new DateTime($da . ' '. $hour .':'. $min. ':00');

if($today < $date){
	//show is not expire yet
	$expire = false;
}else{
	//show is expire
	$expire = true;
}

?>

<!-- main body contents starts here-->
<div class="container" style="margin-top: 2%;">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img class="img-responsive" src="img/sep.png" alt="">
                        <h4><?= Html::encode($cultural_place_translation->place_name); ?></h4>
                        <p><i><?= Html::encode($page_title); ?></i></p>
                        <h4>
							<?= Html::encode($show_translation->show_name); ?>
						</h4>
                        <img class="img-responsive" src="img/sep.png" alt="">
                    </center>
                    <hr>
                    <div class="col-md-4">
                        <img class="img-responsive img-rounded" 
                             src="img/<?= Html::encode($show->image_name); ?>" alt='<?= Html::encode($show_translation->show_name); ?>Photo' style="width: 100%;">
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive img-rounded" 
                             src="img/<?= Html::encode($show->image_name); ?>" alt='<?= Html::encode($show_translation->show_name); ?>Photo' style="width: 100%;">
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive img-rounded" 
                             src="img/<?= Html::encode($show->image_name); ?>" alt='<?= Html::encode($show_translation->show_name); ?>Photo' style="width: 100%;">
                    </div>
                    <div class="col-md-12" style="margin-top:2%;">
						<span class="pull-right">
							<?= Html::a('<i class="fa fa-smile-o"></i>', ['about/like', 'id' => $show->id]); ?>
									
							<b class='theatreInfoText'><?= $like_count; ?></b>
						</span>
                        <p class="theatreInfoText" style="padding-top: 4%;">
                            <?= Html::encode($show_translation->show_description); ?>
                        </p>
						
						<?php if(!$expire and $show->show_status === 1): ?>
							<?= Html::a('<i class="glyphicon glyphicon-credit-card"> ' .\Yii::t('app', 'Buy'). '</i>', ['shop/buy-ticket', 'id' => $show->id], ['class'=>'btn btn-success pull-right']); ?>
						<?php endif; ?>
						
					</div>
                </div>
            </div>
			
			<?php if(!$expire): ?>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6" style="margin-left: -2%;background-color: #e4b9b9;">
							<h4 class="text-center"><?= \Yii::t('app', 'Show Times') ?></h4>
						</div>
					</div>
					<div class="col-md-12" style="background-color: whitesmoke;">
						<?php 
							$size = sizeof($all_shows);
							for($i = 0; $i < $size; $i++):
								if($all_shows[$i]->start_min === 0){
									$min = '00';
								}else{
									$min = $all_shows[$i]->start_min;
								}
						?>
						
						<div class="col-md-2">
							<h6 class="text-center" style="color: #dca7a7"><u><?= Html::encode(Yii::$app->formatter->asDate($all_shows[$i]->begin_date, 'php:d.m.Y')); ?></u></h6>
							<center><b><?= Html::encode($all_shows[$i]->start_hour), ':', Html::encode($min); ?></b></center><br>
						</div>
						
						<?php endfor; ?>
					</div>
				</div>
			<?php endif; ?>
			
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-center" style="padding-top: 5%;"><b><?= \Yii::t('app', 'Feedback from customers'); ?></b></h6><br>
                    
					<!--Here we count comments and show it-->
					<?php 
						$size2 = sizeof($comment);
						for($i = 0; $i < $size2; $i++):
					?>
					
					<b><?= Html::encode($comment[$i]->name); ?></b>
                    <p class="theatreInfoText">
                        <?= Html::encode($comment[$i]->comment); ?>
                    </p>
                    <p class="theatreInfoText" style="text-indent: 2%;">
                        <b><?= Html::encode(Yii::$app->formatter->asDate($comment[$i]->comment_date, 'php:d-m-Y')); ?></b> 
						
						<?= Html::a('<i style="padding-left: 4%;padding-right: 4%;"> ' .\Yii::t('app', 'leave a comment'). '</i>', ['about/user-comment', 'id' => $show->id]); ?>
						
						<!--Here we count stars and show it-->
						<?php 
							$size3 = $comment[$i]->star_count;
							for($x = 0; $x < $size3; $x++):
						?>
						<i class="glyphicon glyphicon-star"></i>
                        
						<?php endfor; ?>
                    </p><br>
					
					<?php endfor; ?>
					
					<?php if($size2 === 0): ?>
						<a href="<?= Url::to(['about/user-comment', 'id' => $show->id]); ?>">
							<i><?= \Yii::t('app', 'leave a comment'); ?></i>
						</a>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 theatreInfoRightCol">
            <div class=" col-md-12 row theatreInfoRightRow">
                <div class="col-md-offset-2 col-md-8">
				<?= Html::panel(
						['heading' => \Yii::t('app', 'Title'), 'body' => '<div class="panel-body">'. \Yii::t('app', 'Content goes here!') .'</div>'],
						Html::TYPE_INFO
					);
				?> 
                
				</div>
            </div>
            <div class="col-md-12 row theatreInfoRightRow">
                <div class="col-md-offset-2 col-md-8">
				<?= Html::panel(
						['heading' => \Yii::t('app', 'How to buy tickets online'), 'body' => '<div class="panel-body">'. \Yii::t('app', 'Content goes here!') .'</div>'],
						Html::TYPE_INFO
					);
				?> 
                
				</div>
				
				<div class="col-md-offset-2 col-md-8">
                
                        <div class="col-md-12 thumbnail text-center" style="margin-top:2%;">
                            <img class="img-responsive img-rounded" src="img/200x150_pic33.png" 
                                 alt="photoTheatre" style="width: 100%;">

                            <div class="caption img-rounded">
                                <h4><?= \Yii::t('app', 'International festival') ?></h4>
                            </div>
                        </div>

                        <div class="col-md-12 thumbnail text-center" style="margin-top:10%;">
                            <img class="img-responsive img-rounded" src="img/200x150_pic44.png" 
                                 alt="photoTheatre" style="width: 100%;">

                            <div class="caption img-rounded">
                                <h4><?= \Yii::t('app', 'International festival') ?></h4>
                            </div>
                        </div>
				</div>
			</div>
		</div>
    </div>

    <hr>
</div> <!-- /container -->