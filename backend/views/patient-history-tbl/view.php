<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientHistoryTbl */

$this->title = $model->p_h_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient History', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-history-tbl-view">

    <h1><?= Html::encode($model->p->fullName."'s History") ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->p_h_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->p_h_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'p_h_id',
           // 'p_id',
             'p.fullName',
            'history_date',
            'histoty_title',
            'history_description',
        ],
    ]) ?>

</div>
