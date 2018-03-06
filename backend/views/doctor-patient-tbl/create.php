<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DoctorPatientTbl */

$this->title = 'New Assignment';
$this->params['breadcrumbs'][] = ['label' => 'Patient Assignment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-patient-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
