<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PatientHistoryTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient History';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-history-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Patient History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'p_h_id',
           // 'p_id',
            ['attribute' => 'p_id',
             'value' => 'p.fullName',],
            'history_date',
            'histoty_title',
            'history_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
