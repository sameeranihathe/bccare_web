<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\PublicChatTbl;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicChatMsgTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Public Chat Messages';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-chat-msg-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pub_ch_msg_id',
          //  'pub_ch_id',
	
	
	
            /*['attribute' => 'pub_ch_id',
             'value' => 'pubCh.pub_ch_title'],*/
	
			['attribute' => 'pub_ch_id',
             'value' => 'pubCh.pub_ch_title',
             'filter' => Html::activeDropDownList($searchModel, 'pub_ch_id', ArrayHelper::map(PublicChatTbl::find()->asArray()->all(), 'pub_ch_id', 'pub_ch_title'),['class'=>'form-control','prompt' => 'Any']),],
	
	
	
	
            'pri_ch_msg:ntext',
            'pri_ch_user_id',
            'pub_ch_msg_date_time',
            // 'pub_ch_msg_active_sta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
