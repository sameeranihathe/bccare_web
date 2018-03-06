<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SchduleTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Schdules';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schdule-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Assign Schdule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'sch_id',
           // 'p_id',
            
             ['attribute' => 'p_id',
             'value' => 'p.fullName',],
            'sch_title',
            'sch_description',
            'sch_plan_date',
            // 'sch_completed_date',
             'sch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
