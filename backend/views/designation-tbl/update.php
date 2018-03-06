<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DesignationTbl */

$this->title = 'Update : ' . $model->desig_id;
$this->params['breadcrumbs'][] = ['label' => 'Designations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->desig_id, 'url' => ['view', 'id' => $model->desig_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="designation-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
