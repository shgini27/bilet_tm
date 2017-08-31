<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TicketHasOrder */

$this->title = $model->ticket_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Has Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="ticket-has-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'ticket_id' => $model->ticket_id, 'order_id' => $model->order_id, 'seat_reserved_id' => $model->seat_reserved_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'ticket_id' => $model->ticket_id, 'order_id' => $model->order_id, 'seat_reserved_id' => $model->seat_reserved_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ticket_id',
            'order_id',
            'seat_reserved_id',
        ],
    ]) ?>

</div>
