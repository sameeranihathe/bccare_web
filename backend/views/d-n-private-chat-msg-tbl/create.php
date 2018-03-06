<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatMsgTbl */

$this->title = 'Create Dnprivate Chat Msg Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Dnprivate Chat Msg Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnprivate-chat-msg-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
