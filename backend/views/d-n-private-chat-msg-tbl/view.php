<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatMsgTbl */

$this->title = $model->pri_ch_msg_id;
$this->params['breadcrumbs'][] = ['label' => 'Dnprivate Chat Msg Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnprivate-chat-msg-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pri_ch_msg_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pri_ch_msg_id], [
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
            'pri_ch_msg_id',
            'pri_ch_id',
            'pri_ch_user_id',
            'pri_ch_msg:ntext',
            'pri_ch_msg_date_time',
        ],
    ]) ?>

</div>
