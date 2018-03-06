<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DoctorPatientTbl */

$this->title = 'Update Assignment: ' . $model->d_p_id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->d_p_id, 'url' => ['view', 'id' => $model->d_p_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-patient-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
