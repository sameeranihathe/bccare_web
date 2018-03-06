<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\DoctorTbl;
use backend\models\PatientTbl;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\DoctorPatientTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-patient-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'd_id')->textInput(
    
    (
        [

            'onkeyup'=>'
                $.post( "index.php?r=doctor-tbl/lists&id='.'"+$(this).val(), function( data ) {
                  $("select#doctorpatienttbl-d_id").html(data);
                });
            ' 
        ]
    ))->label('Filter Doctor')    ?>
    
    <?php
	$log_loc_id = Yii::$app->user->identity->admin_loc_id;
    $adm_type = Yii::$app->user->identity->admin_type;
    if ($adm_type==1)
    {
    ?>
		<?= $form->field($model, 'd_id')->dropDownList(ArrayHelper::map(DoctorTbl::find()->where(['d_loc_id' => $log_loc_id])->asArray()->all(),'d_id',
		function($model, $defaultValue) {return 'Dr'.' '.$model['d_f_name'].' '.$model['d_l_name'].'-'.$model['d_reg_num'];})) ?>
   <?php
    }
    else
    {
    ?>
		<?= $form->field($model, 'd_id')->dropDownList(ArrayHelper::map(DoctorTbl::find()->asArray()->all(),'d_id',
		function($model, $defaultValue) {return 'Dr'.' '.$model['d_f_name'].' '.$model['d_l_name'].'-'.$model['d_reg_num'];})) ?>
   <?php
    }
?>

    <?= $form->field($model, 'p_id')->textInput(
    
    (
        [

            'onkeyup'=>'
                $.post( "index.php?r=patient-tbl/filterpatient&id='.'"+$(this).val(), function( data ) {
                  $("select#doctorpatienttbl-p_id").html(data);
                });
            ' 
        ]
    ))->label('Filter Patient')    ?>

	
    
    <?php
	
    if ($adm_type==1)
    {
    ?>
		<?= $form->field($model, 'p_id')->dropDownList(ArrayHelper::map(PatientTbl::find()->where(['p_loc_id' => $log_loc_id])->asArray()->all(),'p_id',
		function($model, $defaultValue) {return $model['p_f_name'].' '.$model['p_l_name'].'-'.$model['p_reg_num'];})) ?>
   <?php
    }
    else
    {
    ?>
		<?= $form->field($model, 'p_id')->dropDownList(ArrayHelper::map(PatientTbl::find()->asArray()->all(),'p_id',
		function($model, $defaultValue) {return $model['p_f_name'].' '.$model['p_l_name'].'-'.$model['p_reg_num'];})) ?>
   <?php
    }
?>




    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
