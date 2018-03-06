<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SchduleTbl */

$this->title = $model->sch_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Schdules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schdule-tbl-view">

    <h1><?= Html::encode($model->p->fullName."'s Schdule") ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sch_id], [
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
          //  'sch_id',
             'p.fullName',
            //'p_id',
            'sch_title',
            'sch_description',
            'sch_plan_date',
            'sch_completed_date',
            'sch_status',
        ],
    ]) ?>

</div>
