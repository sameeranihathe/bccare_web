<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PubDistrictTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pub District Tbls';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pub-district-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pub District Tbl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dis_Code',
            'Dis_Name',
            'pro_Code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
