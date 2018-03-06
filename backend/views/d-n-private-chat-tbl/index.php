<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DNPrivateChatTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctor-Nurse Private Chats';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnprivate-chat-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'pri_ch_id',
            'pri_ch_room_name',
           // 'd_id',
            ['attribute' => 'd_id',
             'value' => 'd.d_f_name',],

            ['attribute' => 'n_id',
             'value' => 'n.n_f_name',],
           // 'n_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
