<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GendarTbl */

$this->title = 'Create Gendar Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Gendar Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gendar-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
