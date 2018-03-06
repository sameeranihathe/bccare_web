<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'news_id',
            'news_title',
            'news_description',
            'news_date_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
