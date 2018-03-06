<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NursePatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Patients';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-patient-index">

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

         //   'n_p_id',
            //'n_id',
             ['attribute' => 'n_id',
             'value' => 'n.fullName',],

              ['attribute' => 'p_id',
             'value' => 'p.fullName',],
           // 'p_id',

            ['class' => 'yii\grid\ActionColumnDel'],
        ],
    ]); ?>
</div>
