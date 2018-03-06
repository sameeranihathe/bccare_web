<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PDlyStatusTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Daily Status';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pdly-status-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'p_dly_stat_id',
          //  'p_id',
            ['attribute' => 'p_id',
             'value' => 'p.fullName',],
            'p_dly_stat_date',
            'p_dly_stat_time',
            'p_dly_stat_value',

            
        ],
    ]); ?>
</div>
