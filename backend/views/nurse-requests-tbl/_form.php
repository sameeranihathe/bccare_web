<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NurseRequestsTbl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-requests-tbl-form">

    <?php $form = ActiveForm::begin(); ?>

   <!-- <?= $form->field($model, 'p_id')->textInput() ?>

    <?= $form->field($model, 'n_id')->textInput() ?>   -->

    
    <?= $form->field($model, 'n_req_stat')->dropDownList(['Y' => 'Yes', 'N' => 'No'],['prompt' => 'select']) ?>


  



   <!-- <?= $form->field($model, 'n_req_auth_user_id')->textInput() ?>  -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
