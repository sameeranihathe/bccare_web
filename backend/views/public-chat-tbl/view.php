<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatTbl */

$this->title = $model->pub_ch_title;

?>
<div class="public-chat-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pub_ch_id',
            'pub_ch_title',
            'pub_ch_desc',
            'pub_ch_date_time',
            'pub_ch_user_id',
            'pub_ch_active_sta',
        ],
    ]) ?>

     <p>
        <?= Html::a('Update', ['update', 'id' => $model->pub_ch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pub_ch_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
