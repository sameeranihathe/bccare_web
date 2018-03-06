<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\GendarTbl;
use backend\models\Title;
use backend\models\DesignationTbl;
use backend\models\LanguagesTbl;
use backend\models\TreatmentLocationTbl;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NurseTblSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nurse Details';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Nurse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
           // 'n_id',
            'n_reg_num',
            'n_nic',
            
           // 'n_ti_id',
	
	
			['attribute' => 'n_ti_id',
             'value' => 'nTi.title',
             'filter' => Html::activeDropDownList($searchModel, 'n_ti_id', ArrayHelper::map(Title::find()->asArray()->all(), 'ti_id', 'title'),['class'=>'form-control','prompt' => 'Any']),
            ],
	
	
            /*['attribute' => 'n_ti_id',
             'value' => 'nTi.title',],*/
	
	
	
	
	
	
             'n_f_name',
             'n_l_name',
            // 'n_email:email',
            // 'n_contact_num',
            // 'n_address',
            // 'n_dob',
            // 'n_gen_id',
            
             ['attribute' => 'n_gen_id',
             'value' => 'nGen.gendar',
             'filter' => Html::activeDropDownList($searchModel, 'n_gen_id', ArrayHelper::map(GendarTbl::find()->asArray()->all(), 'gen_id', 'gendar'),['class'=>'form-control','prompt' => 'Any']),
            ],


             ['attribute' => 'n_desig_id',
             'value' => 'nDesig.designation',
             'filter' => Html::activeDropDownList($searchModel, 'n_desig_id', ArrayHelper::map(DesignationTbl::find()->asArray()->all(), 'desig_id', 'designation'),['class'=>'form-control','prompt' => 'Any']),
             ],
             //'n_desig_id',
            // 'n_lang_id',
              ['attribute' => 'n_lang_id',
             'value' => 'nLang.language',
             'filter' => Html::activeDropDownList($searchModel, 'n_lang_id', ArrayHelper::map(LanguagesTbl::find()->asArray()->all(), 'lang_id', 'language'),['class'=>'form-control','prompt' => 'Any']),],

            // ['attribute' => 'n_loc_id',
            // 'value' => 'nLoc.loc_name',
            // 'filter' => Html::activeDropDownList($searchModel, 'n_loc_id', ArrayHelper::map(TreatmentLocationTbl::find()->asArray()->all(), 'loc_name', 'loc_name'),['class'=>'form-control','prompt' => 'Select Category']),],


             //'n_loc_id',
            // 'n_img_path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
