<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TreatmentLocationTbl */

$this->title = 'Add Treatment Location';
$this->params['breadcrumbs'][] = ['label' => 'Treatment Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-location-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
