<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\GendarTbl;
use backend\models\Title;
use backend\models\LanguagesTbl;
use backend\models\DesignationTbl;
use backend\models\TreatmentLocationTbl;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\NurseTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-inline">

    <?= $form->field($model, 'n_reg_num')->textInput(['maxlength' => true]) ?>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <?= $form->field($model, 'n_nic')->textInput(['maxlength' => true]) ?>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <?= $form->field($model, 'n_lang_id')->dropDownList(
    ArrayHelper::map(LanguagesTbl::find()->all(),'lang_id','language'),(['prompt' =>'Select']))   ?>

    </div> <br>
    <div class="form-inline">

    <?= $form->field($model, 'n_gen_id')->radioList(
    ArrayHelper::map(GendarTbl::find()->all(),'gen_id','gendar'),(['prompt' =>'Select']))   ?>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp
     <?= $form->field($model, 'n_dob')->widget(
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

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

 <?= $form->field($model, 'n_img_path')->fileInput() ?>

    <br><br>

    <?= $form->field($model, 'n_ti_id')->dropDownList(
    ArrayHelper::map(Title::find()->all(),'ti_id','title'),(['prompt' =>'Select']))   ?>

    <?= $form->field($model, 'n_f_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'n_l_name')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'n_desig_id')->dropDownList(
    ArrayHelper::map(DesignationTbl::find()->all(),'desig_id','designation'),(['prompt' =>'Select']))   ?>

    </div> <br>
    <div class="form-inline">


    <?= $form->field($model, 'n_email')->textInput(['maxlength' => true]) ?>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

    <?= $form->field($model, 'n_contact_num')->textInput(['maxlength' => true]) ?>

    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
     <?php
	$adm_type = Yii::$app->user->identity->admin_type;
		
		if ($adm_type==0)
		{
			?>
			
			
			 <?= $form->field($model, 'n_loc_id')->dropDownList(
			ArrayHelper::map(TreatmentLocationTbl::find()->all(),'loc_id','loc_name'),(['prompt' =>'Select']))   ?>

			
			<?php
			
			
		}
	?>
    <br><br>

     <?= $form->field($model, 'n_address')->textInput(['style' => "width:800px"]) ?>
    
    </div>
    <br><br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style type="text/css">
.form-inline{
        padding:20px;
        border: 2px;
        border-color: black;
        border-style: solid;
        border-radius: 10px;

    }



</style>