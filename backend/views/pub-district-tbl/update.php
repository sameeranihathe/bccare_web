<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PubDistrictTbl */

$this->title = 'Update Pub District Tbl: ' . $model->dis_Code;
$this->params['breadcrumbs'][] = ['label' => 'Pub District Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dis_Code, 'url' => ['view', 'id' => $model->dis_Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pub-district-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
