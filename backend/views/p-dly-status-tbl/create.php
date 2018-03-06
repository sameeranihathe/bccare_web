<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PDlyStatusTbl */

$this->title = 'Create Pdly Status Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Pdly Status Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pdly-status-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
