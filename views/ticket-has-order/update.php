<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TicketHasOrder */

$this->title = Yii::t('app', 'Update Ticket Has Order: {nameAttribute}', [
    'nameAttribute' => $model->ticket_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Has Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ticket_id, 'url' => ['view', 'ticket_id' => $model->ticket_id, 'order_id' => $model->order_id, 'seat_reserved_id' => $model->seat_reserved_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="ticket-has-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
