<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

use yii\base\Model;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model backend\models\PatientTbl */

$this->title = $model->p_id;
//$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-tbl-view">

    <h1><?= Html::encode($model->p_reg_num." - ".$model->pTi->title.". ".$model->fullName) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
             [
             'attribute'=>'p_img_path',
             'value'=> \Yii::$app->request->BaseUrl.'/uploads/patients/'.$model->p_img_path,
             'format' => ['image',['width'=>'100','height'=>'100']],
            ],
          //  'p_id',
            'p_reg_num',
            'p_nic',
            //'p_gen_id',
            'pGen.gendar',
           // 'p_ti_id',
            'pTi.title',
            //'p_f_name',
            //'p_l_name',
        //     'fullName',
            'p_email:email',
            'p_contact_num',
            'p_address',
            'p_dob',
            //'p_bg_id',
            'pBg.bg',
            'pLang.language',
           // 'p_lang_id',
            'p_discharged_stat',

            'p_discharged_date',
            'p_msg_ser_stat',
            //'p_loc_id',
            'pLoc.loc_name',
            //'p_dis_id',
          //  'pDis.district',
            'p_remarks',
           // 'p_img_path',
            'p_relation_name',
            'p_relation_to_patient',
            'p_relation_contactno',
            'gnCode.Gnd_Name',
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->p_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->p_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


     <h2>Assigned Doctors</h2>
    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider2,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],


           // 'n_id',
             ['attribute' => 'd_id',
             'value' => 'd.fullName'],

           
            
        ],
         
    ]); ?>

    <h2>Assigned Nurses</h2>
    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider3,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],


           // 'n_id',
             ['attribute' => 'n_id',
             'value' => 'n.fullName'],

           
            
        ],
         
    ]); ?>


   
</div>
