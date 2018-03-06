<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicUserTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="public-user-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pub_id') ?>

    <?= $form->field($model, 'pub_nic') ?>

    <?= $form->field($model, 'pub_gen_id') ?>

    <?= $form->field($model, 'pub_ti_id') ?>

    <?= $form->field($model, 'pub_f_name') ?>

    <?php // echo $form->field($model, 'pub_l_name') ?>

    <?php // echo $form->field($model, 'pub_email') ?>

    <?php // echo $form->field($model, 'pub_contact_num') ?>

    <?php // echo $form->field($model, 'pub_dob') ?>

    <?php // echo $form->field($model, 'pub_lang_id') ?>

    <?php // echo $form->field($model, 'pub_dis_id') ?>

    <?php // echo $form->field($model, 'pub_remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
