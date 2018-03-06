<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PubProvinceTbl */

$this->title = 'Create Pub Province Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Pub Province Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pub-province-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
