<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BloodGroupTbl */

$this->title = $model->bg_id;
$this->params['breadcrumbs'][] = ['label' => 'Blood Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-group-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bg_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bg_id], [
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
            'bg_id',
            'bg',
        ],
    ]) ?>

</div>
