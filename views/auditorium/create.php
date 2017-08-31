<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Auditorium */

$this->title = Yii::t('app', 'Create Auditorium');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auditoria'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@dektrium/user/views/admin/_menu'); ?>
<div class="auditorium-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
