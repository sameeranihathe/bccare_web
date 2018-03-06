<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NurseTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'n_id') ?>

    <?= $form->field($model, 'n_reg_num') ?>

    <?= $form->field($model, 'n_nic') ?>

    <?= $form->field($model, 'n_gen_id') ?>

    <?= $form->field($model, 'n_ti_id') ?>

    <?php // echo $form->field($model, 'n_f_name') ?>

    <?php // echo $form->field($model, 'n_l_name') ?>

    <?php // echo $form->field($model, 'n_email') ?>

    <?php // echo $form->field($model, 'n_contact_num') ?>

    <?php // echo $form->field($model, 'n_address') ?>

    <?php // echo $form->field($model, 'n_dob') ?>

    <?php // echo $form->field($model, 'n_lang_id') ?>

    <?php // echo $form->field($model, 'n_desig_id') ?>

    <?php // echo $form->field($model, 'n_loc_id') ?>

    <?php // echo $form->field($model, 'n_img_path') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
