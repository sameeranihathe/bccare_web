<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DoctorNurseTbl */

$this->title = 'Update Assignment: ' . $model->d_n_id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Nurse', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->d_n_id, 'url' => ['view', 'id' => $model->d_n_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-nurse-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
