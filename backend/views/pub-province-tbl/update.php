<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PubProvinceTbl */

$this->title = 'Update Pub Province Tbl: ' . $model->pro_Code;
$this->params['breadcrumbs'][] = ['label' => 'Pub Province Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pro_Code, 'url' => ['view', 'id' => $model->pro_Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pub-province-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
