<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DistrictTbl */

$this->title = 'Add District';
$this->params['breadcrumbs'][] = ['label' => 'Districts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
