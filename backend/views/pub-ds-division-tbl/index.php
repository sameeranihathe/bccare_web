<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PubDsDivisionTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pub Ds Division Tbls';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pub-ds-division-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pub Ds Division Tbl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ds_Code',
            'Ds_Name',
            'dis_Code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
