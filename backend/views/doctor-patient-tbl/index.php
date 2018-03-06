<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorPatientTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Patients';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-patient-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Assignment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'd_p_id',
         //   'd_id',
             ['attribute' => 'd_id',
             'value' => 'd.fullName',],
          //  'p_id',
             ['attribute' => 'p_id',
             'value' => 'p.fullName',],
             


            ['class' => 'yii\grid\ActionColumnDel'],
        ],
    ]); ?>
</div>
