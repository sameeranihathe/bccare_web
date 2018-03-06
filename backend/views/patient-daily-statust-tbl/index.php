<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PatientDailyStatusTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Daily Status';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-daily-status-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'p_daily_status_id',
           // 'p_id',
             ['attribute' => 'p_id',
             'value' => 'p.fullName',],
            'stat_date_time',
            'stat_vaule',

           
        ],
    ]); ?>
</div>
