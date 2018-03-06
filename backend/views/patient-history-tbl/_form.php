<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\PatientTbl;

use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\PatientHistoryTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-history-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_id')->textInput(
    
    (
        [

            'onkeyup'=>'
                $.post( "index.php?r=patient-tbl/filterpatient&id='.'"+$(this).val(), function( data ) {
                  $("select#patienthistorytbl-p_id").html(data);
                });
            ' 
        ]
    ))->label('Filter Patient')   ?>

    <?php
    $log_loc_id = Yii::$app->user->identity->admin_loc_id;
    $adm_type = Yii::$app->user->identity->admin_type;
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

   
      <?= $form->field($model, 'history_date')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd'
        ]
]);?>

    <?= $form->field($model, 'histoty_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history_description')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
