<?php

/* @var $this yii\web\View */

use kartik\helpers\Html;
use yii\helpers\Url;

switch($cultural_place->category_id){
	case 2:
		$this->title = \Yii::t('app', 'ABOUT MOVIE');
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'MOVIE'), 'url' => ['site/list', 'id' => 2]];
		
		$page_title = \Yii::t('app', 'Movies');
		break;
	case 3:
		$this->title = \Yii::t('app', 'ABOUT THEATRE');
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'THEATRE'), 'url' => ['site/list', 'id' => 3]];
		
		$page_title = \Yii::t('app', 'Scens');
		break;
	case 4:
		$this->title = \Yii::t('app', 'ABOUT EXHIBITION');
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'EXHIBITION'), 'url' => ['site/list', 'id' => 4]];
		
		$page_title = \Yii::t('app', 'Exhibitions');
		break;
	case 5:
		$this->title = \Yii::t('app', 'ABOUT CONCERT');
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'CONCERT'), 'url' => ['site/list', 'id' => 5]];
		
		$page_title = \Yii::t('app', 'Concerts');
		break;
	case 6:
		$this->title = \Yii::t('app', 'ABOUT CHILDREN');
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'CHILDREN'), 'url' => ['site/list', 'id' => 6]];
		
		$page_title = \Yii::t('app', 'Children');
		break;
	case 7:
		$this->title = \Yii::t('app', 'ABOUT SPORT');
		$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'SPORT'), 'url' => ['site/list', 'id' => 7]];
		
		$page_title = \Yii::t('app', 'Sport Activities');
		break;
}

$this->params['breadcrumbs'][] = Html::encode($this->title);

?>

<!-- main body contents starts here-->
<div class="container" style="margin-top: 2%;">
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-12" style="padding-left: 0;">
                <center><img class="img-responsive" src="img/sep.png" alt="">
                    <h4 ><?= Html::encode($cultural_place_translation->place_name); ?></h4>
                    <img class="img-responsive" src="img/sep.png" alt="">
                </center>
                <div class="col-md-12" style="margin-top: 1%;">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <center>
                                    <img src="img/400x100_pic7.jpg" 
                                         class="img-thumbnail" alt="SportPhoto" style="width: 100%;">
                                </center>
                                <div class="carousel-caption">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </div>

                            <div class="item">
                                <center>
                                    <img src="img/400x100_pic3.jpg" 
                                         class="img-thumbnail" alt="SportPhoto" style="width: 100%;">
                                </center>
                                <div class="carousel-caption">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 5%;">
                <div class="col-md-12"  style="background-color: white;">
                    <p class="theatreInfoText" style="text-align: justify; text-indent: 4%;">
                        <?= Html::encode($cultural_place_translation->cultural_place_description); ?>
                    </p>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 5%;padding-left: 0;">
                <div class="col-md-12" style="margin-bottom: 3%;">
                    <div class="col-md-6 img-rounded" style="background-color: #e4b9b9;">
                        <h4 class="text-center"><?= Html::encode($page_title); ?></h4>
                    </div>
                </div>

                <!-- here is for loop to populate movies -->
                <?php 
					date_default_timezone_set("Asia/Ashgabat");
					$today = new DateTime("now");

					//here we convert server system(php.ini -berlin time-) time to local turkmenistan time
                ?>

				
                <?php if(!$search): ?>
					<?php 
						$showSize = sizeof($show);
						for($i = 0; $i < $showSize; $i++):
						
						if($show[$i]->start_min === 0){
							$min = '00';
						}else{
							$min = $show[$i]->start_min;
						}
						
						if($show[$i]->start_hour < 10){
							$hour = '0'.$show[$i]->start_hour;
						}else{
							$hour = $show[$i]->start_hour;
						}
						
						$da = substr($show[$i]->begin_date, 0, 10);
						$date = new DateTime($da . ' '. $hour .':'. $min. ':00');
						
						$date_string = Yii::$app->formatter->asDate($show[$i]->begin_date, 'php:d.m.Y');
					?>
					
					<?php if ($today < $date): ?>

					<div class="col-md-4" style="margin-bottom: 2%;">
						<div class="col-sm-12 thumbnail text-center removePadding">
							<!--Here user only can see about movie only if registered-->
							<?php if(!Yii::$app->user->isGuest): ?>
							<a href="<?= Url::to(['about/about-show', 'id' => $show[$i]->id])?>">
								<img class="img-responsive img-rounded" 
									 src="img/<?= Html::encode($show[$i]->image_name); ?>" alt="<?= Html::encode($show[$i]->image_name); ?>Photo" 
									 style="width: 100%;">
								<div class="caption img-rounded" 
									 style="background: transparent;top: 0.3rem;">
									<h4 style="color: black;"><b><?= Html::encode($show_translation[$i]->show_name); ?></b></h4>
									<p><?= \Yii::t('app', 'Date'), Html::encode($date_string); ?><br /><?= \Yii::t('app', 'Time'), Html::encode($hour), ':', Html::encode($min); ?></p>
								</div>
							</a>

							<?php if($show[$i]->show_status === 1): ?>
							<div class="caption img-rounded" style="padding-left: 60%;">
								<?= Html::a(\Yii::t('app', 'Buy'), ['shop/buy-ticket', 'id' => $show[$i]->id], ['class'=>'btn btn-danger grid-button']); ?>
							</div>
							<?php endif; ?>
							
							<?php endif; ?>

							<!--this for not registered users-->
							<?php if(Yii::$app->user->isGuest): ?>
							<img class="img-responsive img-rounded" 
								 src="img/<?= Html::encode($show[$i]->image_name); ?>" alt="<?= Html::encode($show[$i]->image_name); ?>Photo" 
								 style="width: 100%;">
							<div class="caption img-rounded" 
								 style="background: transparent;top: 0.3rem;">
								<h4 style="color: black;"><b><?= Html::encode($show_translation[$i]->show_name); ?></b></h4>
								<p><?= \Yii::t('app', 'Date'), $date_string; ?><br /><?= \Yii::t('app', 'Time'), Html::encode($hour), ':', Html::encode($min); ?></p>
							</div>

							<?php if($show[$i]->show_status === 1): ?>
							<div class="caption img-rounded" style="padding-left: 60%;">
								<a onclick="buyButton()" class="btn btn-danger grid-button"><?= \Yii::t('app', 'Buy'); ?></a>
							</div>
							<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>

					<?php endif; ?>
					
					<?php endfor;?>
					
                <?php else: ?>
				
					<?php 
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
						
						$date_string = Yii::$app->formatter->asDate($show->begin_date, 'php:d.m.Y');
					?>
					
					<?php if ($today < $date): ?>

					<div class="col-md-4" style="margin-bottom: 2%;">
						<div class="col-sm-12 thumbnail text-center removePadding">
							<!--Here user only can see about movie only if registered-->
							<?php if(!Yii::$app->user->isGuest): ?>
								<a href="<?= Url::to(['about/about-show', 'id' => $show->id])?>">
									<img class="img-responsive img-rounded" 
										 src="img/<?= Html::encode($show->image_name); ?>" alt="<?= Html::encode($show->image_name); ?>Photo" 
										 style="width: 100%;">
									<div class="caption img-rounded" 
										 style="background: transparent;top: 0.3rem;">
										<h4 style="color: black;"><b><?= Html::encode($show_translation->show_name); ?></b></h4>
										<p><?= \Yii::t('app', 'Date'), Html::encode($date_string); ?><br /><?= \Yii::t('app', 'Time'), Html::encode($hour), ':', Html::encode($min); ?></p>
									</div>
								</a>

								<?php if($show->show_status === 1): ?>
								<div class="caption img-rounded" style="padding-left: 60%;">
									<?= Html::a(\Yii::t('app', 'Buy'), ['shop/buy-ticket', 'id' => $show->id], ['class'=>'btn btn-danger grid-button']); ?>
								</div>
								<?php endif; ?>
							<?php endif; ?>

							<!--this for not registered users-->
							<?php if(Yii::$app->user->isGuest): ?>
								<img class="img-responsive img-rounded" 
									 src="img/<?= Html::encode($show->image_name); ?>" alt="<?= Html::encode($show->image_name); ?>Photo" 
									 style="width: 100%;">
								<div class="caption img-rounded" 
									 style="background: transparent;top: 0.3rem;">
									<h4 style="color: black;"><b><?= Html::encode($show_translation->show_name); ?></b></h4>
									<p><?= \Yii::t('app', 'Date'), Html::encode($date_string); ?><br /><?= \Yii::t('app', 'Time'), Html::encode($hour), ':', Html::encode($min); ?></p>
								</div>

								<?php if($show->show_status === 1): ?>
								<div class="caption img-rounded" style="padding-left: 60%;">
									<a onclick="buyButton()" class="btn btn-danger grid-button"><?= \Yii::t('app', 'Buy'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
					
					<?php else: ?>
						<div class="col-md-4" style="margin-bottom: 2%;">
							<div class="col-sm-12 thumbnail text-center removePadding">
								<!--Here user only can see about movie only if registered-->
								<?php if(!Yii::$app->user->isGuest): ?>
									<a href="<?= Url::to(['about/about-show', 'id' => $show->id])?>">
										<img class="img-responsive img-rounded" 
											 src="img/<?= Html::encode($show->image_name); ?>" alt="<?= Html::encode($show->image_name); ?>Photo" 
											 style="width: 100%;">
										<div class="caption img-rounded" 
											 style="background: transparent;top: 0.3rem;">
											<h4 style="color: black;"><b><?= Html::encode($show_translation->show_name); ?></b></h4>
											<p><?= \Yii::t('app', 'Date'), Html::encode($date_string); ?><br /><?= \Yii::t('app', 'Time'), Html::encode($hour), ':', Html::encode($min); ?></p>
										</div>
									</a>

								<?php else: ?>

									<!--this for not registered users-->
									<img class="img-responsive img-rounded" 
												 src="img/<?= Html::encode($show->image_name); ?>" alt="<?= Html::encode($show->image_name); ?>Photo" 
												 style="width: 100%;">
									<div class="caption img-rounded" 
										  style="background: transparent;top: 0.3rem;">
										<h4 style="color: black;"><b><?= Html::encode($show_translation->show_name); ?></b></h4>
										<p><?= \Yii::t('app', 'Date'), Html::encode($date_string); ?><br /><?= \Yii::t('app', 'Time'), Html::encode($hour), ':', Html::encode($min); ?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>

					<?php endif; ?>

                <?php endif; ?>
				
                <div class="col-sm-12" id="buyMovieInfo" style="display:none;">
                    <p><?= \Yii::t('app', 'if you want to buy or get info about tickets, JUST REGISTEEEEEEEEER!'); ?></p>
                </div>
            </div>
		</div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h5 class="text-center"><b><?= \Yii::t('app', 'FIFA') ?></b></h5>
				<?php for($f = 0; $f < 4; $f++): ?>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <img class="img-responsive img-rounded" 
                             src="img/100x100_pic33.png" alt="photo">
                    </div>
                    <div class="col-md-8">
                        <p class="theatreInfoText" style="padding-bottom: 18%;">
                            <b><?= \Yii::t('app', 'International festival') ?></b>
                        </p>
						<hr />
                    </div>
                </div>
				<?php endfor;?>
            </div>

            <div class="col-md-offset-1 col-md-10" style="margin-top: 3%;">
				<?= Html::panel(
						['heading' => \Yii::t('app', 'Title'), 'body' => '<div class="panel-body">'. \Yii::t('app', 'Content goes here!') .'</div>'],
						Html::TYPE_INFO
					);
				?> 
            </div>

            <div class="col-md-offset-1 col-md-10" style="margin-top: 3%;">
                <div class="col-md-12 thumbnail text-center">
                    <img class="img-responsive img-rounded" 
                         src="img/06.jpg" 
                         alt="photoSport" style="width: 100%;">

                    <div class="caption img-rounded">
                        <h4><?= \Yii::t('app', 'Asian Olimpic Games') ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
</div> <!-- /container -->

