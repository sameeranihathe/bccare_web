<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\datetimepicker\DateTimePicker;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'news_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'news_description')->textArea(['maxlength' => true]) ?>

  <?= $form->field($model, 'news_date_time')->widget(
    DateTimePicker::className(), [
        'name' => 'news_date_time',
		'options' => ['placeholder' => 'Select operating time ...'],
		'convertFormat' => true,
		'pluginOptions' => [
        'format' => 'yyyy-M-dd hh:mm:ss',
        'startDate' => '01-Mar-2014 12:00 AM',
        'todayHighlight' => true
        ]
]);?>
  
   
    <div class="form-group"><br>

        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
