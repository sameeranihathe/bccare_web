<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatMsgTbl */

$this->title = 'Update Public Chat Msg Tbl: ' . $model->pub_ch_msg_id;
$this->params['breadcrumbs'][] = ['label' => 'Public Chat Msg Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pub_ch_msg_id, 'url' => ['view', 'id' => $model->pub_ch_msg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="public-chat-msg-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
