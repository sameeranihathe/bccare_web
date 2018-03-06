<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatMsgTbl */

$this->title = 'Update Dnprivate Chat Msg Tbl: ' . $model->pri_ch_msg_id;
$this->params['breadcrumbs'][] = ['label' => 'Dnprivate Chat Msg Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pri_ch_msg_id, 'url' => ['view', 'id' => $model->pri_ch_msg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dnprivate-chat-msg-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
