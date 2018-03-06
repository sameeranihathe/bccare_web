<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NurseRequestsTbl */

$this->title = 'Approve Nurse Requests: ' . $model->n_req_id;
$this->params['breadcrumbs'][] = ['label' => 'Nurse Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->n_req_id, 'url' => ['view', 'id' => $model->n_req_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nurse-requests-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
