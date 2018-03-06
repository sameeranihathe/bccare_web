<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GendarTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gendar Tbls';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gendar-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gendar Tbl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gen_id',
            'gendar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
