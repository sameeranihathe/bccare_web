<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NurseTbl */

$this->title = 'Add Nurse';
//$this->params['breadcrumbs'][] = ['label' => 'Nurse Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
