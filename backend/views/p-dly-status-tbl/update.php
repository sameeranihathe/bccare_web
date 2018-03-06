<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PDlyStatusTbl */

$this->title = 'Update Pdly Status Tbl: ' . $model->p_dly_stat_id;
$this->params['breadcrumbs'][] = ['label' => 'Pdly Status Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_dly_stat_id, 'url' => ['view', 'id' => $model->p_dly_stat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pdly-status-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
