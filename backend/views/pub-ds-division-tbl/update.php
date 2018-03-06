<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PubDsDivisionTbl */

$this->title = 'Update Pub Ds Division Tbl: ' . $model->ds_Code;
$this->params['breadcrumbs'][] = ['label' => 'Pub Ds Division Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ds_Code, 'url' => ['view', 'id' => $model->ds_Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pub-ds-division-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
