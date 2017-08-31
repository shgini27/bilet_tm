<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReservationType */

$this->title = Yii::t('app', 'Create Reservation Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservation Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="reservation-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
