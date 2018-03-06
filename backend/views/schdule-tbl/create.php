<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchduleTbl */

$this->title = 'Assign Schdule';
$this->params['breadcrumbs'][] = ['label' => 'Patient Schdules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schdule-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
    ]) ?>

</div>
