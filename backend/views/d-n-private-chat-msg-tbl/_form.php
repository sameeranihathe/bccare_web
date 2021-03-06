<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatMsgTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dnprivate-chat-msg-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pri_ch_msg_id')->textInput() ?>

    <?= $form->field($model, 'pri_ch_id')->textInput() ?>

    <?= $form->field($model, 'pri_ch_user_id')->textInput() ?>

    <?= $form->field($model, 'pri_ch_msg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pri_ch_msg_date_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
