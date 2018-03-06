<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientDailyStatusTbl */

$this->title = 'Update Patient Daily Status Tbl: ' . $model->p_daily_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Daily Status Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_daily_status_id, 'url' => ['view', 'id' => $model->p_daily_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-daily-status-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
