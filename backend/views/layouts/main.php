<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
	<style>
	
	
		
	
	</style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img class="homeMenuIcon" src="images/homeIcon0.png">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
       // ['label' => 'Home', 'url' => ['/site/index']],
        
         

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];

    } else {
        if(Yii::$app->user->identity->admin_type==0) {
        $menuItems[] = ['label' => 'Location-Admin', 'url' => ['/user/index']];
    }
        $menuItems[] = '<li>'

            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';


 echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    if(Yii::$app->user->identity->admin_type==0) {
     echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
         
                            ['label' => 'Extras', 'items' => [

                             ['label' => 'Public Users', 'url' => '?r=public-user-tbl'],
                            ['label' => 'Blood Groups', 'url' => '?r=blood-group-tbl'],
                            ['label' => 'Treatment Locations', 'url' => '?r=treatment-location-tbl'],
                            ['label' => 'Districts', 'url' => '?r=district-tbl'],
                            ['label' => 'Languages', 'url' => '?r=languages-tbl'],
                            ['label' => 'Designations', 'url' => '?r=designation-tbl'],
                            ['label' => 'News', 'url' => '?r=news-tbl'],
                            ['label' => 'Products', 'url' => '?r=products-tbl'],
                        ]],
         
                    ],
     
            ]);
 }




            

    }
   

    echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
         
                            ['label' => 'Discussions', 'items' => [
                         
                            ['label' => 'Create a Discussion', 'url' => '?r=public-chat-tbl%2Fcreate'],
                            ['label' => 'Accepted Discussions', 'url' => '?r=public-chat-tbl'],
                            ['label' => 'Pending Discussions', 'url' => '?r=public-chat-tbl'],
                            ['label' => 'View Discussion Messages', 'url' => '?r=public-chat-msg-tbl'],
                        ]],
         
                    ],
     
            ]);

    echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
         
                            ['label' => 'Patients', 'items' => [
                            ['label' => 'Add Patient', 'url' => '?r=patient-tbl%2Fcreate'],
                            ['label' => 'Nurse Requests', 'url' => '?r=nurse-requests-tbl'],
                            ['label' => ' Schdules', 'url' => '?r=schdule-tbl'],
                            ['label' => ' Treatments', 'url' => '?r=patient-history-tbl'],
                            ['label' => ' Daily Status', 'url' => '?r=p-dly-status-tbl'],
                            ['label' => ' Registerd Patients', 'url' => '?r=patient-tbl'],
                        ]],
         
                    ],
     
            ]);

    echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
         
                            ['label' => 'Nurse', 'items' => [
                            ['label' => 'Add Nurse', 'url' => '?r=nurse-tbl%2Fcreate'],
                            ['label' => 'Assign Patients', 'url' => '?r=nurse-patient'],
                            ['label' => 'Registered Nurses', 'url' => '?r=nurse-tbl']
                        ]],
         
                    ],
     
            ]);

    echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
         
                            ['label' => 'Doctors', 'items' => [
                            ['label' => 'Add Doctor', 'url' => '?r=doctor-tbl%2Fcreate'],
                            ['label' => 'Assign Nurses', 'url' => '?r=doctor-nurse-tbl'],
                            ['label' => 'Assign Patients', 'url' => '?r=doctor-patient-tbl'],
                            ['label' => 'Registered Doctors', 'url' => '?r=doctor-tbl']
                        ]],
         
                    ],
     
            ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ACCIMT <?= date('Y') ?></p>

        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



