<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GendarTbl */

$this->title = 'Update Gendar Tbl: ' . $model->gen_id;
$this->params['breadcrumbs'][] = ['label' => 'Gendar Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gen_id, 'url' => ['view', 'id' => $model->gen_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gendar-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
