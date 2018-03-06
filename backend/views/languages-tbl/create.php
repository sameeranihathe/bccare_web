<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LanguagesTbl */

$this->title = 'Add Language';
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
