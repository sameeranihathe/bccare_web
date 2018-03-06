<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PubDistrictTbl */

$this->title = 'Create Pub District Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Pub District Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pub-district-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
