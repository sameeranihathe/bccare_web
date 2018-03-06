<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="public-chat-tbl-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'pub_ch_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pub_ch_desc')->textArea(['maxlength' => true]) ?>

  
    <?= $form->field($model, 'pub_ch_date_time')->widget(
    DateTimePicker::className(), [
        'name' => 'news_date_time',
        'options' => ['placeholder' => 'Select operating time ...'],
        'convertFormat' => true,
        'pluginOptions' => [
        'format' => 'yyyy-M-dd hh:ss:ss',
        'startDate' => '01-Mar-2014 12:00 AM',
        'todayHighlight' => true
        ]
]);?>


    <?php /*?><?= $form->field($model, 'pub_ch_user_id')->textInput() ?><?php */?>

    <?= $form->field($model, 'pub_ch_active_sta')->dropDownList(['1' => 'Yes', '0' => 'No']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
