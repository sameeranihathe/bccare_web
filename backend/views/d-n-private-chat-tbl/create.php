<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DNPrivateChatTbl */

$this->title = 'Create Dnprivate Chat Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Dnprivate Chat Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnprivate-chat-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
