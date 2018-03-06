<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatTbl */

$this->title = 'Create Discussion';
//$this->params['breadcrumbs'][] = ['label' => 'Public Chat Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-chat-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
