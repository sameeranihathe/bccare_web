<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BloodGroupTbl */

$this->title = 'Add Blood Group';
//$this->params['breadcrumbs'][] = ['label' => 'Blood Groups', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-group-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
