<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PubGnDivisionTbl */

$this->title = 'Create Pub Gn Division Tbl';
$this->params['breadcrumbs'][] = ['label' => 'Pub Gn Division Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pub-gn-division-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
