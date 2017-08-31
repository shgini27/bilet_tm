<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketOption */

$this->title = Yii::t('app', 'Create Ticket Option');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="ticket-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
