<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model backend\models\DoctorTbl */

$this->title = $model->d_id;
//$this->params['breadcrumbs'][] = ['label' => 'Doctor Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-tbl-view">

    <h1><?= Html::encode($model->d_reg_num." - ".$model->dTi->title.". ".$model->fullName) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
             [
             'attribute'=>'d_img_path',
             'value'=> \Yii::$app->request->BaseUrl.'/uploads/doctors/'.$model->d_img_path,
             'format' => ['image',['width'=>'100','height'=>'150']],
            ],
            
         //   'd_id',
            'd_reg_num',
            'd_nic',
            //'d_ged_id',
            'dGed.gendar',
            //'d_ti_id',
            'dTi.title',
            //'d_f_name',
            'fullName',
           // 'd_l_name',
            'd_email:email',
            'd_contact_num',
            'd_address',
            'd_dob',
            //'d_lang_id',
            'dLang.language',
            'dDesig.designation',
           // 'd_desig_id',
            'dLoc.loc_name',
            //'d_loc_id',
           // 'd_img_path',

           
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->d_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->d_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <h2>Assigned Nurses</h2>
    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],


           // 'n_id',
             ['attribute' => 'n_id',
             'value' => 'n.fullName'],

           
            
        ],
         
    ]); ?>

    <h2>Assigned Patients</h2>

     <?= 
    GridView::widget([
        'dataProvider' => $dataProvider2,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],


           // 'n_id',
             ['attribute' => 'p_id',
             'value' => 'p.fullName'],

           
            
        ],
         
    ]); ?>
    
    

</div>
