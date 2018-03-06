<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserTypeTbl */

$this->title = 'Create User Type Tbl';
$this->params['breadcrumbs'][] = ['label' => 'User Type Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
