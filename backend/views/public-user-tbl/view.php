<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicUserTbl */

$this->title = $model->pub_id;
$this->params['breadcrumbs'][] = ['label' => 'Public Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-user-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pub_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pub_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pub_id',
            'pub_nic',
           // 'pub_gen_id',
            'pubGen.gendar',
            //'pub_ti_id',
            'pubTi.title',
            'pub_f_name',
            'pub_l_name',
            'pub_email:email',
            'pub_contact_num',
            'pub_dob',
           // 'pub_lang_id',
            'pubLang.language',
            'pubDis.district',
           // 'pub_dis_id',
            'pub_remarks',
        ],
    ]) ?>

</div>
