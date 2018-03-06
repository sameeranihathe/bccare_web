<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NurseTbl */

$this->title = 'Update Nurse: ' . $model->n_id;
$this->params['breadcrumbs'][] = ['label' => 'Nurse Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->n_id, 'url' => ['view', 'id' => $model->n_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nurse-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
