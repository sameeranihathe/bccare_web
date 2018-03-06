<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DesignationTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Designations';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Designation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'desig_id',
            'designation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
