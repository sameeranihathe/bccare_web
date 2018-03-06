<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\AppAsset;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\GendarTbl;
use backend\models\DesignationTbl;
use backend\models\LanguagesTbl;
use backend\models\TreatmentLocationTbl;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 
$this->title = 'Doctor Details';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
             'fullName',
            //'d_id',
            'd_reg_num',
            'd_nic',
           // 'd_ged_id',
           // 'dTi.title',
            ['attribute' => 'd_ti_id',
             'value' => 'dTi.title',],

             'd_f_name',
             'd_l_name',

          //    ['attribute' => 'd_ged_id',
          //   'value' => 'dGed.gendar',],

             [
             'attribute' => 'd_ged_id',
             'value' => 'dGed.gendar',
             'filter' => Html::activeDropDownList($searchModel, 'd_ged_id', ArrayHelper::map(GendarTbl::find()->asArray()->all(), 'gen_id', 'gendar'),['class'=>'form-control','prompt' => 'Any']),
            ],

              ['attribute' => 'd_desig_id',
             'value' => 'dDesig.designation',
             'filter' => Html::activeDropDownList($searchModel, 'd_desig_id', ArrayHelper::map(DesignationTbl::find()->asArray()->all(), 'desig_id', 'designation'),['class'=>'form-control','prompt' => 'Any']),],
            // 'd_email:email',
            // 'd_contact_num',
            // 'd_address',
            // 'd_dob',
            // 'dLang.language',
            ['attribute' => 'd_lang_id',
             'value' => 'dLang.language',
              'filter' => Html::activeDropDownList($searchModel, 'd_lang_id', ArrayHelper::map(LanguagesTbl::find()->asArray()->all(), 'lang_id', 'language'),['class'=>'form-control','prompt' => 'Any']),],
            // 'd_desig_id',
            // 'dLoc.loc_name',

            // ['attribute' => 'd_loc_id',
            // 'value' => 'dLoc.loc_name',
            // 'filter' => Html::activeDropDownList($searchModel, 'd_loc_id', ArrayHelper::map(TreatmentLocationTbl::find()->asArray()->all(), 'loc_name', 'loc_name'),['class'=>'form-control','prompt' => 'Select Category']),],

            // 'd_img_path',

             


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

     ?>
     

</div>

<script type="text/javascript">
    
</script>
