<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SeatReserved */

$this->title = Yii::t('app', 'Create Seat Reserved');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seat Reserveds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="seat-reserved-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
