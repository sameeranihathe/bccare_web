<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DoctorTbl */

$this->title = 'Add Doctor';
//$this->params['breadcrumbs'][] = ['label' => 'Doctor Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
`
</div>
