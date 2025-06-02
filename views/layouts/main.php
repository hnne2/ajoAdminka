<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> - AdminLTE</title>
        <?php $this->head() ?>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/adminlte3/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/adminlte3/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php $this->beginBody() ?>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= Yii::$app->urlManager->createUrl(['/vape/index']) ?>" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">User</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>" class="dropdown-item" data-method="post">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign out
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= Yii::$app->urlManager->createUrl(['/vape/index']) ?>" class="brand-link">
                <img src="<?= Yii::getAlias('@web') ?>/adminlte3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- Checks -->
                        <li class="nav-item <?= Yii::$app->controller->id === 'check' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->controller->id === 'check' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-clipboard-check"></i>
                                <p>
                                    Чеки
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/check/index']) ?>" class="nav-link <?= Yii::$app->controller->id === 'check' && Yii::$app->controller->action->id === 'index' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список чеков</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/check/create']) ?>" class="nav-link <?= Yii::$app->controller->id === 'check' && Yii::$app->controller->action->id === 'create' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить чек</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Draws -->
                        <li class="nav-item <?= Yii::$app->controller->id === 'draw' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->controller->id === 'draw' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-dice"></i>
                                <p>
                                    Розыгрыши
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/draw/index']) ?>" class="nav-link <?= Yii::$app->controller->id === 'draw' && Yii::$app->controller->action->id === 'index' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список розыгрышей</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/draw/create']) ?>" class="nav-link <?= Yii::$app->controller->id === 'draw' && Yii::$app->controller->action->id === 'create' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить розыгрыш</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Prizes -->
                        <li class="nav-item <?= Yii::$app->controller->id === 'prize' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->controller->id === 'prize' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-gift"></i>
                                <p>
                                    Призы
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/prize/index']) ?>" class="nav-link <?= Yii::$app->controller->id === 'prize' && Yii::$app->controller->action->id === 'index' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список призов</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/prize/create']) ?>" class="nav-link <?= Yii::$app->controller->id === 'prize' && Yii::$app->controller->action->id === 'create' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить приз</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Scratch Cards -->
                        <li class="nav-item <?= Yii::$app->controller->id === 'scratch-card' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->controller->id === 'scratch-card' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-ticket-alt"></i>
                                <p>
                                    Скретч-карты
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/scratch-card/index']) ?>" class="nav-link <?= Yii::$app->controller->id === 'scratch-card' && Yii::$app->controller->action->id === 'index' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список скретч-карт</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/scratch-card/create']) ?>" class="nav-link <?= Yii::$app->controller->id === 'scratch-card' && Yii::$app->controller->action->id === 'create' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить скретч-карту</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Users -->
                        <li class="nav-item <?= Yii::$app->controller->id === 'users' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->controller->id === 'users' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Пользователи
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/users/index']) ?>" class="nav-link <?= Yii::$app->controller->id === 'user' && Yii::$app->controller->action->id === 'index' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список пользователей</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/users/create']) ?>" class="nav-link <?= Yii::$app->controller->id === 'user' && Yii::$app->controller->action->id === 'create' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить пользователя</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= Html::encode($this->title) ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'options' => ['class' => 'breadcrumb float-sm-right'],
                                'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                                'activeItemTemplate' => "<li class='breadcrumb-item active'>{link}</li>\n",
                            ]) ?>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= Yii::getAlias('@web') ?>/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= Yii::getAlias('@web') ?>/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= Yii::getAlias('@web') ?>/adminlte3/dist/js/adminlte.min.js"></script>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>