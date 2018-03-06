<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DoctorTbl */

$this->title = 'Update Doctor: ' . $model->d_id;
$this->params['breadcrumbs'][] = ['label' => 'Doctor Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->d_id, 'url' => ['view', 'id' => $model->d_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
