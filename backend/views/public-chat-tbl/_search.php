<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatTblSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="public-chat-tbl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pub_ch_id') ?>

    <?= $form->field($model, 'pub_ch_title') ?>

    <?= $form->field($model, 'pub_ch_desc') ?>

    <?= $form->field($model, 'pub_ch_date_time') ?>

    <?= $form->field($model, 'pub_ch_user_id') ?>

    <?php // echo $form->field($model, 'pub_ch_active_sta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
