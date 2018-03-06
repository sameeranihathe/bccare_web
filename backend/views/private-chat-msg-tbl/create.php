<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PrivateChatMsgTbl */

$this->title = 'Create Private Chat Msg Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Private Chat Msg Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="private-chat-msg-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
