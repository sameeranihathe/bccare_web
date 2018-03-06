<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatMsgTbl */

$this->title = $model->pub_ch_msg_id;
$this->params['breadcrumbs'][] = ['label' => 'Public Chat Msg Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-chat-msg-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pub_ch_msg_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pub_ch_msg_id], [
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
            'pub_ch_msg_id',
            'pub_ch_id',
            'pri_ch_msg:ntext',
            'pri_ch_user_id',
            'pub_ch_msg_date_time',
            'pub_ch_msg_active_sta',
        ],
    ]) ?>

</div>
