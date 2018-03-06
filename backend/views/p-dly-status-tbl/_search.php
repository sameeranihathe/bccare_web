<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PDlyStatusTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pdly-status-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_dly_stat_id') ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'p_dly_stat_date') ?>

    <?= $form->field($model, 'p_dly_stat_time') ?>

    <?= $form->field($model, 'p_dly_stat_value') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
