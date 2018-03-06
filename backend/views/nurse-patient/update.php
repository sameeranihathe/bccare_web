<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NursePatient */

$this->title = 'Update Assignment: ' . $model->n_p_id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->n_p_id, 'url' => ['view', 'id' => $model->n_p_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nurse-patient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
