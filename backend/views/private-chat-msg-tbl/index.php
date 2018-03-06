<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrivateChatMsgTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Private Chat Messages';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="private-chat-msg-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          // 'pri_ch_msg_id',
            //'pri_ch_id',
            
             ['attribute' => 'pri_ch_id',
             'value' => 'priCh.pri_ch_room_name',],
             'pri_ch_user_id',
            'pri_ch_msg:ntext',
            'pri_ch_msg_date_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
