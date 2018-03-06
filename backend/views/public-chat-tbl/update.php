<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicChatTbl */

$this->title = 'Update Discussion: ' . $model->pub_ch_id;

?>
<div class="public-chat-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
