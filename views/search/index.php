<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$place_size = sizeof($cultural_place_translation);
$show_size = sizeof($show_translation);
$art_size = sizeof($article_translation);
?>

<!-- main body contents starts here-->
<div class="container" style="margin-top: 2%;">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
			
				<!-- here is for loop for place search, if there is value we will display it -->
				<?php 
					
					for($p = 0; $p < $place_size; $p++):
					
					$description = substr($cultural_place_translation[$p]->cultural_place_description, 0, 300);
				?>
				<?php if ($place_size > 0): ?>
				
					<?php 
					
						$place_size2 = sizeof($cultural_place);
						for($p1 = 0; $p1 < $place_size2; $p1++){
							if($cultural_place[$p1]->id === $cultural_place_translation[$p]->cultural_place_id){
								
								$img_path = $cultural_place[$p1]->image_name;
								$url = ['site/list', 'p_id' => $cultural_place[$p1]->id];
								
							}
						}
					?>
					<div class="row">
						<div class="col-md-12" style="background-color: whitesmoke;">
							<div class="col-md-4 img-responsive">
								<img class="img-responsive img-rounded" style="width: 80%;" 
								src="img/<?= Html::encode($img_path); ?>.jpg" alt="<?= Html::encode($img_path); ?>Photo" />
							</div>
							<div class="col-md-8">
								<h4 class="text-center">
									<?= Html::a(Html::encode($cultural_place_translation[$p]->place_name), $url) ?>
								</h4>
								<p style="padding-top:2%;"><?= $description, ' ...'; ?></p>
							</div>
						</div>
					</div>
					<hr />
				<?php endif; ?>
				
				<?php endfor;?>
				
				<!-- here is for loop for shows, if there is some value we will display it -->
				<?php 
					
					for($s = 0; $s < $show_size; $s++):
					
					$show_description = substr($show_translation[$s]->show_description, 0, 300);
				?>
					<?php if ($show_size > 0): ?>
				
					<?php 
					
						$show_size2 = sizeof($show);
						for($s2 = 0; $s2 < $show_size2; $s2++){
							if($show[$s2]->id === $show_translation[$s]->show_id){
								
								$show_img_path = $show[$s2]->image_name;
								$show_url = ['about/about', 's_id' => $show[$s2]->id];
								
							}
						}
					?>
					
					<div class="row">
						<div class="col-md-12" style="background-color: whitesmoke;">
							<div class="col-md-4">
								<img class="img-responsive img-rounded" style="width: 80%;" 
								src="img/<?= Html::encode($show_img_path); ?>" alt="<?= Html::encode($show_img_path); ?>Photo" />
							</div>
							<div class="col-md-8">
								<h4 class="text-center">
									<?= Html::a(Html::encode($show_translation[$s]->show_name), $show_url) ?>
								</h4>
								<p style="padding-top:2%;"><?= Html::encode($show_description), ' ...'; ?></p>
							</div>
						</div>
					</div>
					<hr />
				
					<?php endif; ?>
				
				<?php endfor;?>
				
				<!-- here is for loop for shows, if there is some value we will display it -->
				<?php 
					if ($art_size > 0):
						for($art = 0; $art < $art_size; $art++):
					
						$article_description = substr($article_translation[$art]->title, 0, 300);
				?>
				
					<div class="row">
						<div class="col-md-12" style="background-color: whitesmoke;">
							<div class="col-md-4">
								<img class="img-responsive img-rounded" style="width: 80%;" src="img/<?= Html::encode($article[$art]->image_name); ?>" alt="<?= $article[$art]->image_name; ?>Photo" />
							</div>
							<div class="col-md-8">
								<h4 class="text-center">
									<?= Html::a(Html::encode($article_translation[$art]->title), ['site/index']) ?>
								</h4>
								<p style="padding-top:2%;"><?= Html::encode($article_description), ' ...'; ?></p>
							</div>
						</div>
					</div>
					<hr />
				
				<?php 
						endfor;
					endif; 
				?>
				
				<!--here we display that search result was empty-->
				<?php if($place_size === 0 and $show_size === 0): ?>
					
					<div class="row">
						<div class="col-md-12" style="background-color: whitesmoke;">
							<h4><?= \Yii::t('app', 'Sorry, we did not find any result according to your search key'); ?></h4>
						</div>
					</div>
				
				<?php endif; ?>
            
		</div>
    </div>
</div> <!-- /container -->