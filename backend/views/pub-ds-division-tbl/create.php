<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PubDsDivisionTbl */

$this->title = 'Create Pub Ds Division Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Pub Ds Division Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pub-ds-division-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
