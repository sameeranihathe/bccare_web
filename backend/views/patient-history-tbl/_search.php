<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientHistoryTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-history-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_h_id') ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'history_date') ?>

    <?= $form->field($model, 'histoty_title') ?>

    <?= $form->field($model, 'history_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
