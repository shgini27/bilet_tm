<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketOptionTranslation */

$this->title = Yii::t('app', 'Create Ticket Option Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Option Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="ticket-option-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
