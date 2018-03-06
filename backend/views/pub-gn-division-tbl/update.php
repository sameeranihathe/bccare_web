<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PubGnDivisionTbl */

$this->title = 'Update Pub Gn Division Tbl: ' . $model->gn_Code;
$this->params['breadcrumbs'][] = ['label' => 'Pub Gn Division Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gn_Code, 'url' => ['view', 'id' => $model->gn_Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pub-gn-division-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
