<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketOptionData */

$this->title = Yii::t('app', 'Create Ticket Option Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Option Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="ticket-option-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
