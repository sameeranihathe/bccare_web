<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\PatientTbl;
use backend\models\NurseTbl;
/* @var $this yii\web\View */
/* @var $model backend\models\PrivateChatTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="private-chat-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pri_ch_room_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_id')->dropDownList(
    ArrayHelper::map(PatientTbl::find()->all(),'p_id','p_f_name'),(['prompt' =>'Select']))   ?>

     <?= $form->field($model, 'n_id')->dropDownList(
    ArrayHelper::map(NurseTbl::find()->all(),'n_id','n_f_name'),(['prompt' =>'Select']))   ?>


    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
