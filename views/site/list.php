<?php

/* @var $this yii\web\View */

use kartik\helpers\Html;

switch($category_id){
	case 2:
		$this->title = \Yii::t('app', 'ABOUT MOVIE');
		$page_title = \Yii::t('app', 'Movie theatres of the city Ashgabat');
		break;
	case 3:
		$this->title = \Yii::t('app', 'ABOUT THEATRE');
		$page_title = \Yii::t('app', 'Theatres of the city Ashgabat');
		break;
	case 4:
		$this->title = \Yii::t('app', 'ABOUT EXHIBITION');
		$page_title = \Yii::t('app', 'Exhibitions of the city Ashgabat');
		break;
	case 5:
		$this->title = \Yii::t('app', 'ABOUT CONCERT');
		$page_title = \Yii::t('app', 'Concerts of the city Ashgabat');
		break;
	case 6:
		$this->title = \Yii::t('app', 'ABOUT CHILDREN');
		$page_title = \Yii::t('app', 'Childrens of the city Ashgabat');
		break;
	case 7:
		$this->title = \Yii::t('app', 'ABOUT SPORT');
		$page_title = \Yii::t('app', 'Sport of the city Ashgabat');
		break;
}

$this->params['breadcrumbs'][] = Html::encode($this->title);
?>

<div class="container">
    <!-- Example row of columns -->
    <div class="row theatreInfoTitleRow">
        <div class="col-md-12">
            <center><img class="img-responsive" src="img/sep.png" alt="">
                <h4 ><?= Html::encode($page_title); ?></h4>
                <img class="img-responsive" src="img/sep.png" alt="">
            </center>
        </div>
    </div>
    <div class="row">
        <div class='col-md-8' style="background-color: white;">
		<?php if(!$search): ?>
			<?php 
				
				$placeSize = sizeof($cultural_place);
				//here we iterate thrue and array and display values
				for($i = 0; $i < $placeSize; $i++):
			
			?>
            <div class='row theatreInfoRow'>
                <div class='col-sm-4'>
                    <img class="img-responsive img-rounded" style="width: 100%;" 
                         src='img/<?= Html::encode($cultural_place[$i]->image_name); ?>.jpg' alt='<?= Html::encode($cultural_place[$i]->image_name); ?>'><!-- 200x120pixel pic's for all theatre's -->
                </div>
                <div class='col-sm-8'>
                    <h4 class='text-center text-capitalize'>
						<?= Html::a(Html::encode($cultural_place_translation[$i]->place_name), ['about/about', 'id' => $cultural_place[$i]->id]); ?>
                    </h4>
                    <div class="theatreInfoImg">
                        <i class="fa fa-phone"></i>
                        <a href='tel:+99312941902' class='theatreInfoText'>
                            <?= Html::encode($cultural_place[$i]->tel1); ?>
                        </a>
						<span class="theatreInfoText"> / </span>
						<a href='tel:+99312941902' class='theatreInfoText'>
                            <?= Html::encode($cultural_place[$i]->tel2); ?>
                        </a>
						<span class="theatreInfoText"><?= \Yii::t('app', 'fax'); ?></span>
						<a href='tel:+99312941902' class='theatreInfoText'>
                            <?= Html::encode($cultural_place[$i]->fax); ?>
                        </a><br>
                        <i class="fa fa-address-book-o"></i>
                        <a href='#' class='theatreInfoText'>
                            <?= Html::encode($cultural_place_translation[$i]->place_city), ', ',  Html::encode($cultural_place_translation[$i]->place_street); ?>
                        </a><br>
                        <i class="fa fa-clock-o"></i> 
                        <a class='theatreInfoText'>
                            <?= Html::encode($cultural_place_translation[$i]->work_hour), ', ', \Yii::t('app', 'Closed'), Html::encode($cultural_place_translation[$i]->off_day); ?>
                        </a><br>
                        <i class="fa fa-bus"></i> 
                        <a class='theatreInfoText'>
                            <?= \Yii::t('app', 'Bus routs'), Html::encode($cultural_place_translation[$i]->bus); ?>
                        </a><br>
                    </div>
                    <!-- <span class="pull-right">
                        <a href='#'>
                            <i class="fa fa-smile-o"></i>
                        </a>
                        <b class='theatreInfoText'>523</b>
                    </span> -->
                </div>
            </div>
            <hr>
			<?php endfor;?>
			<?php else: ?>
			<div class='row theatreInfoRow'>
                <div class='col-sm-4'>
                    <img class="img-responsive img-rounded" style="width: 100%;" 
                         src='img/<?= Html::encode($cultural_place->image_name); ?>.jpg' alt='<?= Html::encode($cultural_place->image_name); ?>'><!-- 200x120pixel pic's for all theatre's -->
                </div>
                <div class='col-sm-8'>
                    <h4 class='text-center text-capitalize'>
						<?= Html::a(Html::encode($cultural_place_translation->place_name), ['about/about', 'id' => $cultural_place->id]); ?>
                    </h4>
                    <div class="theatreInfoImg">
                        <i class="fa fa-phone"></i>
                        <a href='tel:+99312941902' class='theatreInfoText'>
                            <?= Html::encode($cultural_place->tel1); ?>
                        </a>
						<span class="theatreInfoText"> / </span>
						<a href='tel:+99312941902' class='theatreInfoText'>
                            <?= Html::encode($cultural_place->tel2); ?>
                        </a>
						<span class="theatreInfoText"><?= \Yii::t('app', 'fax'); ?></span>
						<a href='tel:+99312941902' class='theatreInfoText'>
                            <?= Html::encode($cultural_place->fax); ?>
                        </a><br>
                        <i class="fa fa-address-book-o"></i>
                        <a href='#' class='theatreInfoText'>
                            <?= Html::encode($cultural_place_translation->place_city), ', ',  Html::encode($cultural_place_translation->place_street); ?>
                        </a><br>
                        <i class="fa fa-clock-o"></i> 
                        <a class='theatreInfoText'>
                            <?= Html::encode($cultural_place_translation->work_hour), ', ', \Yii::t('app', 'Closed'), Html::encode($cultural_place_translation->off_day); ?>
                        </a><br>
                        <i class="fa fa-bus"></i> 
                        <a class='theatreInfoText'>
                            <?= \Yii::t('app', 'Bus routs'), Html::encode($cultural_place_translation->bus); ?>
                        </a><br>
                    </div>
                    <!-- <span class="pull-right">
                        <a href='#'>
                            <i class="fa fa-smile-o"></i>
                        </a>
                        <b class='theatreInfoText'>523</b>
                    </span> -->
                </div>
            </div>
            <hr>
			<?php endif; ?>
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
						['heading' => \Yii::t('app', 'Title'), 'body' => '<div class="panel-body">'. \Yii::t('app', 'Content goes here!') .'</div>'],
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
</div> <!-- /container -->