<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserTypeTbl */

$this->title = 'Update User Type Tbl: ' . $model->user_type_id;
$this->params['breadcrumbs'][] = ['label' => 'User Type Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_type_id, 'url' => ['view', 'id' => $model->user_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-type-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
