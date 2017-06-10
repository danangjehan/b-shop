<?php
use yii\helpers\Html;
use app\assets\AdminLteAsset;
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
/* @var $this \yii\web\View */
/* @var $content string */

$session = Yii::$app->session;
$session->open();


    AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assetsTemplate/assets/ico/favicon.png">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <header class="main-header">

            <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

            <nav class="navbar navbar-static-top" role="navigation">

                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">

                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- User Account: style can be found in dropdown.less -->

                        <li class="dropdown user user-menu">
                            
                                <?= Html::a(
                                            '',
                                            ['/site/logout'],
                                            ['data-method' => 'post', 'class' => 'btn btn-primary btn-flat fa fa-power-off']
                                        ) ?>
                                <span class="hidden-xs"></span>
                            <!-- </a> -->
                        </li>

                        <!-- User Account: style can be found in dropdown.less -->
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">

            <section class="sidebar">

                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                    </div>
                    <div class="pull-left info">
                        <p><?= $session['session.user']['nama_user']?></p>
                    </div>
                </div>

                <!-- search form -->
                <!-- /.search form -->

                <?= dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu'],
                        'items' => [
                            ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                            ['label' => 'Upload','icon'=>'upload','url' => ['/upload/upload']],
                            ['label' => 'List Upload','icon'=>'eye','url' => ['/upload/list-upload']],
                            ['label' => 'Update Akun','icon'=>'user','url' => ['/upload/detail-akun']],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                            ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Same tools',
                                'icon' => 'share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                                    [
                                        'label' => 'Level One',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                            [
                                                'label' => 'Level Two',
                                                'icon' => 'circle-o',
                                                'url' => '#',
                                                'items' => [
                                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ]
                ) ?>

            </section>

        </aside>


        <div class="content-wrapper">
            <section class="content-header">
                
            </section>

            <section class="content">
                <?=
                Breadcrumbs::widget(
                    [
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'homeLink'=>false,
                    ]
                ) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </section>
        </div>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

