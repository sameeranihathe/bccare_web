<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NurseRequestsTbl */

$this->title = 'Create Nurse Requests Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Nurse Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-requests-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
