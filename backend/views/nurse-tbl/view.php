<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

use yii\base\Model;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model backend\models\NurseTbl */

$this->title = $model->n_id;

?>
<div class="nurse-tbl-view">

    <h1><?= Html::encode($model->n_reg_num." - ".$model->nTi->title.". ".$model->fullName) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
             'attribute'=>'n_img_path',
             'value'=> \Yii::$app->request->BaseUrl.'/uploads/nurses/'.$model->n_img_path,
             'format' => ['image',['width'=>'100','height'=>'100']],
            ],
          //  'n_id',
            'n_reg_num',
            'n_nic',
           // 'n_gen_id',
            'nGen.gendar',
            //'n_ti_id',
            'nTi.title',
           // 'n_f_name',
           // 'n_l_name',
            'fullName',
            'n_email:email',
            'n_contact_num',
            'n_address',
            'n_dob',
            //'n_lang_id',
            'nLang.language',
           // 'n_desig_id',
            'nDesig.designation',
          // 'n_loc_id',
            'nLoc.loc_name',
            //'n_img_path',
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->n_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->n_id], [
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
        'dataProvider' => $dataProvider,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],


           // 'n_id',
             ['attribute' => 'd_id',
             'value' => 'd.fullName'],

           
            
        ],
         
    ]); ?>

 <h2>Assigned Patients</h2>
    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider2,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],


           // 'n_id',
             ['attribute' => 'p_id',
             'value' => 'p.fullName'],

           
            
        ],
         
    ]); ?>

   
</div>
