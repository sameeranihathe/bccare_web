<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientDailyStatusTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-daily-status-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_daily_status_id') ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'stat_date_time') ?>

    <?= $form->field($model, 'stat_vaule') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
