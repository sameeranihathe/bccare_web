<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicChatTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discussions';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-chat-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add New Discussion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'pub_ch_id',
            'pub_ch_title',
            'pub_ch_desc',
            'pub_ch_date_time',
            'pub_ch_user_id',
             'pub_ch_active_sta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
