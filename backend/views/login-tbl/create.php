<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LoginTbl */

$this->title = 'Create Login Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Login Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
