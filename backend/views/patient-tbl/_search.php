<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'p_reg_num') ?>

    <?= $form->field($model, 'p_nic') ?>

    <?= $form->field($model, 'p_gen_id') ?>

    <?= $form->field($model, 'p_ti_id') ?>

    <?php // echo $form->field($model, 'p_f_name') ?>

    <?php // echo $form->field($model, 'p_l_name') ?>

    <?php // echo $form->field($model, 'p_email') ?>

    <?php // echo $form->field($model, 'p_contact_num') ?>

    <?php // echo $form->field($model, 'p_address') ?>

    <?php // echo $form->field($model, 'p_dob') ?>

    <?php // echo $form->field($model, 'p_bg_id') ?>

    <?php // echo $form->field($model, 'p_lang_id') ?>

    <?php // echo $form->field($model, 'p_discharged_stat') ?>

    <?php // echo $form->field($model, 'p_discharged_date') ?>

    <?php // echo $form->field($model, 'p_msg_ser_stat') ?>

    <?php // echo $form->field($model, 'p_loc_id') ?>

    <?php // echo $form->field($model, 'p_dis_id') ?>

    <?php // echo $form->field($model, 'p_remarks') ?>

    <?php // echo $form->field($model, 'p_img_path') ?>

    <?php // echo $form->field($model, 'p_relation_name') ?>

    <?php // echo $form->field($model, 'p_relation_to_patient') ?>

    <?php // echo $form->field($model, 'p_relation_contactno') ?>

    <?php // echo $form->field($model, 'gn_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
