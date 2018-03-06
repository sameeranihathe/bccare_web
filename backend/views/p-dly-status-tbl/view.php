<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PDlyStatusTbl */

$this->title = $model->p_dly_stat_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient daily Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pdly-status-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->p_dly_stat_id], [
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
            'p_dly_stat_id',
           // 'p_id',
            'p.fullName',
            'p_dly_stat_date',
            'p_dly_stat_time',
            'p_dly_stat_value',
        ],
    ]) ?>

</div>
