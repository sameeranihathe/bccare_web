<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PubProvinceTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pub Province Tbls';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pub-province-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pub Province Tbl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pro_Code',
            'Pro_Name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
