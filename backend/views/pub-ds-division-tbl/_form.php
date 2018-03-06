<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PubDsDivisionTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pub-ds-division-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Ds_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dis_Code')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
