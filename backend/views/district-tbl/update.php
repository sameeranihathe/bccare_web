<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DistrictTbl */

$this->title = 'Update District: ' . $model->dis_id;
$this->params['breadcrumbs'][] = ['label' => 'Districts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dis_id, 'url' => ['view', 'id' => $model->dis_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="district-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
