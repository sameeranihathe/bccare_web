<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserTypeTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Type Tbls';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Type Tbl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_type_id',
            'user_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
