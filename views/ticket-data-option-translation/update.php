<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TicketDataOptionTranslation */

$this->title = Yii::t('app', 'Update Ticket Data Option Translation: {nameAttribute}', [
    'nameAttribute' => $model->ticket_option_data_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Data Option Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ticket_option_data_id, 'url' => ['view', 'ticket_option_data_id' => $model->ticket_option_data_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="ticket-data-option-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
