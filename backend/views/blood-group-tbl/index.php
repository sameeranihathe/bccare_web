<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BloodGroupTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blood Groups';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-group-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Blood Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'bg_id',
            'bg',

            ['class' => 'yii\grid\ActionColumnDel'],
        ],
    ]); ?>
</div>
