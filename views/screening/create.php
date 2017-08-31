<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Screening */

$this->title = Yii::t('app', 'Create Screening');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Screenings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="screening-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
