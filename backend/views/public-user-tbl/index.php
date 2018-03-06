<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicUserTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Public Users';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-user-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'pub_id',
            'pub_nic',
            //'pub_gen_id',
            ['attribute' => 'pub_gen_id',
             'value' => 'pubGen.gendar',],
            //'pub_ti_id',
             ['attribute' => 'pub_ti_id',
             'value' => 'pubTi.title',],
            'pub_f_name',
             'pub_l_name',
            // 'pub_email:email',
            // 'pub_contact_num',
            // 'pub_dob',
            // 'pub_lang_id',
            // 'pub_dis_id',
            // 'pub_remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
