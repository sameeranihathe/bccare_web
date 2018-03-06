<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NursePatient */

$this->title = 'New Assignment';
$this->params['breadcrumbs'][] = ['label' => 'Assign Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-patient-create">

    <h1><?= Html::encode($this->title) ?></h1>
    

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
