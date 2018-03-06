<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LoginTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Login Tbls';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Login Tbl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'login_id',
            'user_id',
            'user_name',
            'password',
            'user_type_id',
            // 'loging_status',
            // 'password_change_stat',
            // 'account_active_stat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
