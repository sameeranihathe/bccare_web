<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PatientHistoryTbl */

$this->title = 'Add Patient History';
$this->params['breadcrumbs'][] = ['label' => 'Patient History Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-history-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
