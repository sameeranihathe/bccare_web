<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchduleTbl */

$this->title = 'Update Schdule: ' . $model->sch_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Schdules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sch_id, 'url' => ['view', 'id' => $model->sch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schdule-tbl-update">

    <h1><?= Html::encode("Edit ".$model->p->fullName."'s Schdule") ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
