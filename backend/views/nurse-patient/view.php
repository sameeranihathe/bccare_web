<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Lookup;
use backend\models\NurseTbl;
/* @var $this yii\web\View */
/* @var $model backend\models\NursePatient */

$this->title = $model->n_p_id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->n_p_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->n_p_id], [
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
            'n_p_id',
            
            'n.fullName',
           // 'n_id',
            'p.fullName',
            //'p_id',
           
            
           
        ],
    ]) ?>

</div>
