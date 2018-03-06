<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dnprivate-chat-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pri_ch_room_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_id')->textInput() ?>

    <?= $form->field($model, 'n_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
