<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PublicUserTbl */

$this->title = 'Create Public User Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Public User Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-user-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
