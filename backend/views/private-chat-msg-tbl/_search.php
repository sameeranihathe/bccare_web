<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PrivateChatMsgTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="private-chat-msg-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pri_ch_msg_id') ?>

    <?= $form->field($model, 'pri_ch_id') ?>

    <?= $form->field($model, 'pri_ch_user_id') ?>

    <?= $form->field($model, 'pri_ch_msg') ?>

    <?= $form->field($model, 'pri_ch_msg_date_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
