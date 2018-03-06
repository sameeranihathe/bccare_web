<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PubDistrictTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pub-district-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Dis_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_Code')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
