<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorNurseTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Nurses';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-nurse-tbl-index">

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

           // 'd_n_id',
           // 'd_id',

             ['attribute' => 'd_id',
             'value' => 'd.fullName'],

           // 'n_id',
             ['attribute' => 'n_id',
             'value' => 'n.fullName'],

            ['class' => 'yii\grid\ActionColumnDel'],
            
        ],
         
    ]); ?>
</div>

<script type="text/javascript">
    function redirect()
</script>
