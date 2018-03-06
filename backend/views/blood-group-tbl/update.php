<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BloodGroupTbl */

$this->title = 'Update Blood Group: ' . $model->bg_id;
$this->params['breadcrumbs'][] = ['label' => 'Blood Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bg_id, 'url' => ['view', 'id' => $model->bg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blood-group-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
