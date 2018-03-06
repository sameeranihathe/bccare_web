<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DoctorTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fullName') ?>

    <?= $form->field($model, 'd_id') ?>

    <?= $form->field($model, 'd_reg_num') ?>

    <?= $form->field($model, 'd_nic') ?>

    <?= $form->field($model, 'd_ged_id') ?>

    <?= $form->field($model, 'd_ti_id') ?>

    <?php // echo $form->field($model, 'd_f_name') ?>

    <?php // echo $form->field($model, 'd_l_name') ?>

    <?php // echo $form->field($model, 'd_email') ?>

    <?php // echo $form->field($model, 'd_contact_num') ?>

    <?php // echo $form->field($model, 'd_address') ?>

    <?php // echo $form->field($model, 'd_dob') ?>

    <?php // echo $form->field($model, 'd_lang_id') ?>

    <?php // echo $form->field($model, 'd_desig_id') ?>

    <?php // echo $form->field($model, 'd_loc_id') ?>

    <?php // echo $form->field($model, 'd_img_path') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
