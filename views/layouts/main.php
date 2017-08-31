<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\FooterSign;
use app\components\SearchField;
use app\components\LanguageSwitcher;
use app\models\CategoryTranslation;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
	
	//earlier we setted language id, so now we getting it
	$id = Yii::$app->session->get('langId');
	
	$translate = CategoryTranslation::find($id)->where(['language_id' => $id])->all();
	
    NavBar::begin([
        'brandLabel' => \Yii::t('app', 'BiletTM'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	
	echo '<div class="row">
			<div class="container">';
			
	echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [ 
			
            Yii::$app->user->isGuest ? (
                ['label' => \Yii::t('app', 'Login'), 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    \Yii::t('app', 'Logout') .'(' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
				.'<li>'
                . Html::beginForm(['/user/settings/profile'], 'post')
                . Html::submitButton( \Yii::t('app', 'Profile'), ['class' => 'btn btn-link logout'])
                . Html::endForm()
                . '</li>'
            ),
			['label' => \Yii::t('app', 'TM'), 'url' => ['/site/translate', 'lang' => 'TM']],
			['label' => \Yii::t('app', 'RU'), 'url' => ['/site/translate', 'lang' => 'RU']],
        ],
    ]);
	
	echo SearchField::widget();
	
	echo '</div>
		</div>';
		
	echo '<div class="row">
			<div class="container">';
	/*style="background-color: #dca7a7;"*/
	//var $id;
	
    echo Nav::widget([
				'options' => ['class' => 'nav nav-pills nav-justified'],
				'items' => [
					['label' => $translate[0]->category_name, 'url' => ['/site/index']],
					['label' => $translate[1]->category_name, 'url' => ['/site/list', 'id' => 2]],
					['label' => $translate[2]->category_name, 'url' => ['/site/list', 'id' => 3]],
					['label' => $translate[3]->category_name, 'url' => ['/site/list', 'id' => 4]],
					['label' => $translate[4]->category_name, 'url' => ['/site/list', 'id' => 5]],
					['label' => $translate[5]->category_name, 'url' => ['/site/list', 'id' => 6]],
					['label' => $translate[6]->category_name, 'url' => ['/site/list', 'id' => 7]],
				],
			]);
	
	echo '</div>
		</div>';
	
    NavBar::end();
	
    ?>

	
    <div class="container" style="margin-top:3%;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		
		<?= $content ?>
		
    </div>
</div>

<!--footer*******************************************************************-->

<?= FooterSign::widget() ?>	

<footer class="footer" id="footer">

    <div class="container">
       <div class="col-md-12">
            <ul>	
                <li><a href="#"><i class="fa fa-facebook" id='facebookColor'></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" id='twitterColor'></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" id='linkedInColor'></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" id='googlePlusColor'></i></a></li>
            </ul>
            <p>
				<center><a href="http://ttweb.org"><img src="img/ttWeb.png" alt="ttWebLogo" style="width: 8%;"></a></center>
				<p class="pull-left">&copy; My Company <?= date('Y') ?></p>

				<p class="pull-right"><?= Yii::powered() ?></p>
            </p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
