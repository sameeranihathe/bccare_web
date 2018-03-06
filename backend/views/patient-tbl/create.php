<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PatientTbl */

$this->title = 'Add Patient';
//$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelnew' => $modelnew,
        'modelnew2' => $modelnew2,
        'modelnew3' => $modelnew3,
    ]) ?>

</div>
