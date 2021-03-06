<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PubDsDivisionTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pub-ds-division-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ds_Code') ?>

    <?= $form->field($model, 'Ds_Name') ?>

    <?= $form->field($model, 'dis_Code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
