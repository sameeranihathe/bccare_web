<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\PatientTbl;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\SchduleTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schdule-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

     
     <?= $form->field($model, 'p_id')->dropDownList(
    ArrayHelper::map(PatientTbl::find()->all(),'p_id','fullName'),(['prompt' =>'Select']))   ?>

    

    <?= $form->field($model, 'sch_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_description')->textArea(['rows' => 4]) ?>

    
    <?= $form->field($model, 'sch_plan_date')->widget(
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

    
    <?= $form->field($model, 'sch_completed_date')->widget(
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


    <?= $form->field($model, 'sch_status')->dropDownList(['P' => 'Pending', 'C' => 'Cancel','Y' => 'Completed']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>