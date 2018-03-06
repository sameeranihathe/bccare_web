<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientHistoryTbl */

$this->title = 'Update Patient History: ' . $model->p_h_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient History', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_h_id, 'url' => ['view', 'id' => $model->p_h_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-history-tbl-update">

    <h1><?= Html::encode("Edit ".$model->p->fullName."'s History") ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
