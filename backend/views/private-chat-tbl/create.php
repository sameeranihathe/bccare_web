<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PrivateChatTbl */

$this->title = 'Create Private Chat Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Private Chat Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="private-chat-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
