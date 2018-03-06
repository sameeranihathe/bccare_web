<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'product_id',
            'product_title',
            'product_description',
            'product_img_path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
