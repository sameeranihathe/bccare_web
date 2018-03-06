<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NurseRequestsTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pending Nurse Requests ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-requests-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
     <!--   <?= Html::a('Create Nurse Requests Tbl', ['create'], ['class' => 'btn btn-success']) ?>   -->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'n_req_id',
          //  'p_id',
            ['attribute' => 'p_id',
             'value' => 'p.fullName',],

             ['attribute' => 'n_id',
             'value' => 'n.fullName',],

           // 'n_id',
          //  'n_req_stat',
        //    'n_req_auth_user_id',

            ['class' => 'yii\grid\ActionColumnCustom'],

        ],
    ]); ?>
</div>
