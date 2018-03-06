<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LoginTbl */

$this->title = 'Update Login Tbl: ' . $model->login_id;
$this->params['breadcrumbs'][] = ['label' => 'Login Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->login_id, 'url' => ['view', 'id' => $model->login_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="login-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
