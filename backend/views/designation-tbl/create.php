<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DesignationTbl */

$this->title = 'Add Designation';
$this->params['breadcrumbs'][] = ['label' => 'Designations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
