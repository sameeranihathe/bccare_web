<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicUserTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="public-user-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pub_nic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pub_gen_id')->textInput() ?>

    <?= $form->field($model, 'pub_ti_id')->textInput() ?>

    <?= $form->field($model, 'pub_f_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pub_l_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pub_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pub_contact_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pub_dob')->textInput() ?>

    <?= $form->field($model, 'pub_lang_id')->textInput() ?>

    <?= $form->field($model, 'pub_dis_id')->textInput() ?>

    <?= $form->field($model, 'pub_remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
