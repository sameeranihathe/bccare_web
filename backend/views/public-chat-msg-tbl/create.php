<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatMsgTbl */

$this->title = 'Create Public Chat Msg Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Public Chat Msg Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-chat-msg-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
