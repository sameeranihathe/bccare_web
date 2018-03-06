<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\NurseTbl;
use backend\models\PatientTbl;
/* @var $this yii\web\View */
/* @var $model backend\models\NursePatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'n_id')->textInput(
    
    (
        [

            'onkeyup'=>'
                $.post( "index.php?r=nurse-tbl/filternurse&id='.'"+$(this).val(), function( data ) {
                  $("select#nursepatient-n_id").html(data);
                });
            ' 
        ]
    ))->label('Filter Nurse')    ?>  
     <?php
	$log_loc_id = Yii::$app->user->identity->admin_loc_id;
    $adm_type = Yii::$app->user->identity->admin_type;
	
    if ($adm_type==1)
    {
    ?>
		<?= $form->field($model, 'n_id')->dropDownList(ArrayHelper::map(NurseTbl::find()->where(['n_loc_id' => $log_loc_id])->asArray()->all(),'n_id',
		function($model, $defaultValue) {return $model['n_f_name'].' '.$model['n_l_name'].'-'.$model['n_reg_num'];})) ?>
   <?php
    }
    else
    {
    ?>
		<?= $form->field($model, 'n_id')->dropDownList(ArrayHelper::map(NurseTbl::find()->asArray()->all(),'n_id',
		function($model, $defaultValue) {return $model['n_f_name'].' '.$model['n_l_name'].'-'.$model['n_reg_num'];})) ?>
   <?php
    }
?>

    <?= $form->field($model, 'p_id')->textInput(
    
    (
        [

            'onkeyup'=>'
                $.post( "index.php?r=patient-tbl/filterpatient&id='.'"+$(this).val(), function( data ) {
                  $("select#nursepatient-p_id").html(data);
                });
            ' 
        ]
    ))->label('Filter Patient')    ?>

    <?php

    if ($adm_type==1)
    {
    ?>

    <?= $form->field($model, 'p_id')->dropDownList(
    ArrayHelper::map(PatientTbl::find()->where(['p_loc_id' => $log_loc_id])->asArray()->all(),
    'p_id',
    function($model, $defaultValue) {
        return $model['p_f_name'].' '.$model['p_l_name'].'-'.$model['p_reg_num'];
    }
    ))->label('Patient')  ?>

     <?php
    }
    else
    {
    ?>
    <?= $form->field($model, 'p_id')->dropDownList(
    ArrayHelper::map(PatientTbl::find()->asArray()->all(),
    'p_id',
    function($model, $defaultValue) {
        return $model['p_f_name'].' '.$model['p_l_name'].'-'.$model['p_reg_num'];
    }
    ))->label('Patient')  ?>

      <?php
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
