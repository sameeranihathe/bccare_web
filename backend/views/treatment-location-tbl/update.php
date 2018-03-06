<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TreatmentLocationTbl */

$this->title = 'Update Treatment Location: ' . $model->loc_id;
$this->params['breadcrumbs'][] = ['label' => 'Treatment Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->loc_id, 'url' => ['view', 'id' => $model->loc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treatment-location-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
