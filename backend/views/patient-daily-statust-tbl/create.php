<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PatientDailyStatusTbl */

$this->title = 'Create Patient Daily Status Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Patient Daily Status Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-daily-status-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
