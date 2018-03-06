<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatTbl */

$this->title = 'Update Private Chat Details: ' . $model->pri_ch_id;
$this->params['breadcrumbs'][] = ['label' => 'Doctor-Nurse Private Chat Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pri_ch_id, 'url' => ['view', 'id' => $model->pri_ch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dnprivate-chat-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
