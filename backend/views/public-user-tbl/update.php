<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicUserTbl */

$this->title = 'Update Public User Tbl: ' . $model->pub_id;
$this->params['breadcrumbs'][] = ['label' => 'Public User Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pub_id, 'url' => ['view', 'id' => $model->pub_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="public-user-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
