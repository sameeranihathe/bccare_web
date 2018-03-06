<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\TreatmentLocationTbl;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Location Admin';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add a Location Admin', ['goto_signup_pg'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'username',
			'admin_f_name',
			'admin_l_name',
			'email',
			'admin_contact_num',
			
	
	
	
	 ['attribute' => 'admin_loc_id',
             'value' => 'adminLoc.loc_name',
             'filter' => Html::activeDropDownList($searchModel, 'admin_loc_id', ArrayHelper::map(TreatmentLocationTbl::find()->asArray()->all(), 'loc_id', 'loc_name'),['class'=>'form-control','prompt' => 'Any']),
             ]
	,
	

            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumnDel'],
        ],
    ]); ?>
</div>
