<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PrivateChatTbl */

$this->title = $model->pri_ch_id;
$this->params['breadcrumbs'][] = ['label' => 'Nurse-Patient Private Chat Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="private-chat-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pri_ch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pri_ch_id], [
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
            'pri_ch_id',
            'pri_ch_room_name',
            //'p_id',
            'p.p_f_name',
             'n.n_f_name',
            //'n_id',
        ],
    ]) ?>

</div>
