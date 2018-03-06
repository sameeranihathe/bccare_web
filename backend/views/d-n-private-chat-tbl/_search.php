<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dnprivate-chat-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pri_ch_id') ?>

    <?= $form->field($model, 'pri_ch_room_name') ?>

    <?= $form->field($model, 'd_id') ?>

    <?= $form->field($model, 'n_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
