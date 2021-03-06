<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PDlyStatusTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pdly-status-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_id')->textInput() ?>

    <?= $form->field($model, 'p_dly_stat_date')->textInput() ?>

    <?= $form->field($model, 'p_dly_stat_time')->textInput() ?>

    <?= $form->field($model, 'p_dly_stat_value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
