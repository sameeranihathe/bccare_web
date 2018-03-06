<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\GendarTbl;
use backend\models\Title;
use backend\models\LanguagesTbl;
use backend\models\DesignationTbl;
use backend\models\TreatmentLocationTbl;
use dosamigos\datepicker\DatePicker;

$this->title = 'Add new user';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>


    <?php /*?><?= $form->field($model, 'admin_type')->dropDownList(['0' => 'Super Admin', '1' => 'Normal Admin'],['prompt' => 'select']) ?><?php */?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?php /*?><?= $form->field($model, 'admin_reg_num')->textInput(['maxlength' => true]) ?><?php */?>
    <?= $form->field($model, 'admin_nic')->textInput(['maxlength' => true]) ?>
                
    <?= $form->field($model, 'admin_gen_id')->dropDownList(
    ArrayHelper::map(GendarTbl::find()->all(),'gen_id','gendar'),(['prompt' =>'Select']))   ?>

    <?= $form->field($model, 'admin_ti_id')->dropDownList(
    ArrayHelper::map(Title::find()->all(),'ti_id','title'),(['prompt' =>'Select']))   ?>

    <?= $form->field($model, 'admin_f_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_l_name')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'admin_contact_num')->textInput(['maxlength' => true]) ?>

    <?php /*?><?= $form->field($model, 'admin_address')->textInput(['maxlength' => true]) ?><?php */?>

   
     <?php /*?><?= $form->field($model, 'admin_dob')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd'
        ]
]);?><?php */?>

    <?php /*?><?= $form->field($model, 'admin_lang_id')->dropDownList(
    ArrayHelper::map(LanguagesTbl::find()->all(),'lang_id','language'),(['prompt' =>'Select']))   ?><?php */?>

     <?php /*?><?= $form->field($model, 'admin_desig_id')->dropDownList(
    ArrayHelper::map(DesignationTbl::find()->all(),'desig_id','designation'),(['prompt' =>'Select']))   ?><?php */?>

     <?= $form->field($model, 'admin_loc_id')->dropDownList(
    ArrayHelper::map(TreatmentLocationTbl::find()->all(),'loc_id','loc_name'),(['prompt' =>'Select']))   ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
