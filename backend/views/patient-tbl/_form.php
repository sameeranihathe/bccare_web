<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\GendarTbl;
use backend\models\Title;
use backend\models\LanguagesTbl;
use backend\models\BloodGroupTbl;
use backend\models\TreatmentLocationTbl;
use backend\models\DistrictTbl;
use backend\models\PubGnDivisionTbl;
use backend\models\PubProvinceTbl;
use backend\models\PubDsDivisionTbl;
use backend\models\PubDistrictTbl;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\PatientTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-tbl-form">

    <?php $form = ActiveForm::begin(); ?>
    
  
    

 <div class="form-inline">

  
    <?= $form->field($model, 'p_reg_num')->textInput(['style' => "width:100px"]) ?>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

    <?= $form->field($model, 'p_nic')->textInput(['maxlength' => true])->label('*NIC No') ?>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

    <?= $form->field($model, 'p_lang_id')->dropDownList(
    ArrayHelper::map(LanguagesTbl::find()->all(),'lang_id','language'),(['prompt' =>'Select']))->label('*Preferred Language')   ?>

 </div>  
<br>

 <div class="form-inline">

   
    <?= $form->field($model, 'p_gen_id')->radioList(
    ArrayHelper::map(GendarTbl::find()->all(),'gen_id','gendar'),(['prompt' =>'Select']))   ?>

    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp


    <?= $form->field($model, 'p_dob')->widget(
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

    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp


     <?= $form->field($model, 'p_img_path')->fileInput() ?>
<br><br>
    <?= $form->field($model, 'p_ti_id')->dropDownList(
    ArrayHelper::map(Title::find()->all(),'ti_id','title'),(['prompt' =>'Select']))   ?>
     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp

    <?= $form->field($model, 'p_f_name')->textInput(['maxlength' => true]) ?>
     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp

    <?= $form->field($model, 'p_l_name')->textInput(['maxlength' => true]) ?>

    

</div>

<br>


<div class="form-inline">
    <?= $form->field($model, 'p_email')->textInput(['length' => 100]) ?>

     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

    <?= $form->field($model, 'p_contact_num')->textInput(['maxlength' => true]) ?>

    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <?php
    $adm_type = Yii::$app->user->identity->admin_type;
        
        if ($adm_type==0)
        {
            ?>
            
            
             <?= $form->field($model, 'p_loc_id')->dropDownList(
            ArrayHelper::map(TreatmentLocationTbl::find()->all(),'loc_id','loc_name'),(['prompt' =>'Select']))   ?>

            
            <?php
            
            
        }
    ?>

     <br><br>

    <?= $form->field($model, 'p_address')->textInput(['style' => "width:875px"]) ?>

     
    <br><br>

    <?= $form->field($modelnew, 'pro_Code')->dropDownList(
    ArrayHelper::map(PubProvinceTbl::find()->all(),'pro_Code','Pro_Name'),
    (
        [
            'prompt' =>'Select',
            'onchange'=>'
                $.post( "index.php?r=pub-district-tbl/lists&id='.'"+$(this).val(), function( data ) {
                  $("select#pubdistricttbl-dis_code").html(data);
                });
            ' 
        ]
    ))   ?>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

     <?= $form->field($modelnew3, 'dis_Code')->dropDownList(
    ArrayHelper::map(PubDistrictTbl::find()->all(),'dis_Code','Dis_Name'),
    (
        [
            'prompt' =>'Select',
            'onchange'=>'
                $.post( "index.php?r=pub-ds-division-tbl/lists&id='.'"+$(this).val(), function( data ) {
                  $("select#pubdsdivisiontbl-ds_code").html(data);
                });
            ' 
        ]
    ))   ?>

    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

    <?= $form->field($modelnew2, 'ds_Code')->dropDownList(
    ArrayHelper::map(PubDsDivisionTbl::find()->all(),'ds_Code','Ds_Name'),
    (
        [
            'prompt' =>'Select',
            'onchange'=>'
                $.post( "index.php?r=pub-gn-division-tbl/lists&id='.'"+$(this).val(), function( data ) {
                  $("select#patienttbl-gn_code").html(data);
                });
            ' 
           
        ]
    ))   ?>
    <br>

    <?= $form->field($model, 'gn_code')->dropDownList(
    ArrayHelper::map(PubGnDivisionTbl::find()->all(),'gn_Code','Gnd_Name'),(['prompt' =>'Select']))->label('Grama Niladari Area')   ?>
</div> 
<br>

    
<div class="form-inline">   
    <?= $form->field($model, 'p_bg_id')->dropDownList(
    ArrayHelper::map(BloodGroupTbl::find()->all(),'bg_id','bg'),(['prompt' =>'Select']))   ?>
    
    
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    

    
    <?= $form->field($model, 'p_discharged_stat')->dropDownList(['1' => 'Yes', '0' => 'No'],(
        [
            'prompt' =>'Select',
            'onchange'=>'dischargeCheck();' 
        ]
    )) ?>
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
   
    <?= $form->field($model, 'p_discharged_date')->widget(
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

    
<br><br>
   

    

   <!-- <?= $form->field($model, 'p_dis_id')->dropDownList(
    ArrayHelper::map(DistrictTbl::find()->all(),'dis_id','district'),(['prompt' =>'Select']))   ?>  -->

    <br>


    <?= $form->field($model, 'p_remarks')->textArea(['style' => "width:820px;height:100px"]) ?>

 

  </div>  
<br>


     <div class="form-inline">  

    <?= $form->field($model, 'p_relation_name')->textInput(['maxlength' => true]) ?>

    &nbsp &nbsp &nbsp

    <?= $form->field($model, 'p_relation_to_patient')->textInput(['maxlength' => true]) ?>

    &nbsp &nbsp &nbsp
    <?= $form->field($model, 'p_relation_contactno')->textInput() ?>
   </div>
    

   <br>


    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
	function dischargeCheck()
	{
		/*alert("ttttt");*/
		var myval = document.getElementById('patienttbl-p_discharged_stat').value;
		if(myval==0)
			{
				document.getElementById('patienttbl-p_discharged_date').value='';
				document.getElementById('patienttbl-p_discharged_date').disabled = true;
			}
		else
			{
				document.getElementById('patienttbl-p_discharged_date').disabled = false;
			}
		
	}
	
</script>


<style type="text/css">
.form-inline{
        padding:20px;
        border: 2px;
        border-color: black;
        border-style: solid;
        border-radius: 10px;

    }



</style>

