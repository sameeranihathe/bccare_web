<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\NurseRequestsTbl */

$this->title = $model->n_req_id;
$this->params['breadcrumbs'][] = ['label' => 'Nurse Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-requests-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

  <!--  <p>
        <?= Html::a('Approve', ['update', 'id' => $model->n_req_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->n_req_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>           -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'n_req_id',
           // 'p_id',
            'p.fullName',
          //  'n_id',
             'n.fullName',
            'n_req_stat',
            'n_req_auth_user_id',
        ],
    ]) ?>

</div>

