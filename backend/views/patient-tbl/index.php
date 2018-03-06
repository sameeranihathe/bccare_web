<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\GendarTbl;
use backend\models\Title;
use backend\models\LanguagesTbl;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PatientTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'p_id',
          //  'p_reg_num',
            'p_nic',
          //  'p_gen_id',
         //   'p_ti_id',
             /*['attribute' => 'p_ti_id',
             'value' => 'pTi.title',],*/
	
			['attribute' => 'p_ti_id',
             'value' => 'pTi.title',
              'filter' => Html::activeDropDownList($searchModel, 'p_ti_id', ArrayHelper::map(Title::find()->asArray()->all(), 'ti_id', 'title'),['class'=>'form-control','prompt' => 'Any']),],
	
	
            

             'p_f_name',
             'p_l_name',
            // 'p_email:email',
            // 'p_contact_num',
            // 'p_address',
            // 'p_dob',
            // 'p_bg_id',
            // 'p_lang_id',
	
			['attribute' => 'p_lang_id',
             'value' => 'pLang.language',
              'filter' => Html::activeDropDownList($searchModel, 'p_lang_id', ArrayHelper::map(LanguagesTbl::find()->asArray()->all(), 'lang_id', 'language'),['class'=>'form-control','prompt' => 'Any']),],
	
/*	
	
              ['attribute' => 'p_lang_id',
             'value' => 'pLang.language',],*/
            
            // 'p_discharged_stat',
            // 'p_discharged_date',
            // 'p_msg_ser_stat',
            // 'p_loc_id',
            // 'p_dis_id',
            // 'p_remarks',
            // 'p_img_path',
            // 'p_relation_name',
            // 'p_relation_to_patient',
            // 'p_relation_contactno',
            // 'gn_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
