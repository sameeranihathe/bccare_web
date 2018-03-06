<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SchduleTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schdule-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sch_id') ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'sch_title') ?>

    <?= $form->field($model, 'sch_description') ?>

    <?= $form->field($model, 'sch_plan_date') ?>

    <?php // echo $form->field($model, 'sch_completed_date') ?>

    <?php // echo $form->field($model, 'sch_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
