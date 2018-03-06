<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GendarTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gendar-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gendar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
