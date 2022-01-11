<?php defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\User\User;
use Concrete\Core\Validation\CSRF\Token;

?>
<!doctype html>
<html lang="<?php echo Localization::activeLanguage()?>" class="no-js <?php if( $c->isEditMode() ){ echo "editmode";}; ?>">
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo $view->getThemePath(); ?>/css/vendor/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $view->getThemePath(); ?>/css/vendor/bootstrap/bootstrap-grid.css">
        <link rel="stylesheet" href="/concrete/css/font-awesome.css">
        <?php echo $html->css($view->getStylesheet('main.less'));?>
        <?php echo $html->css($view->getStylesheet('menu.css'));?>
        <?php echo $html->css($view->getStylesheet('submenu.css'));?>
        <?php View::element('header_required'); ?>
    </head>

    <!-- set page name and pagetype name as class -->
    <body>

        <div class="<?php echo $c->getPageWrapperClass(); ?>">
    
            <!-- navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light" role= "navigation" id="globalnav">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand" href="#">
                        <?php
                        $a = new GlobalArea('Header Site Title');
                        $a->display();

                        ?>
                    </a>
                    <button class="navbar-toggler <?php if($_GET['menuopen']){echo " in ";} ?>"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbar-collapse-1"
                            aria-controls="navbar-collapse-1"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <!-- nav items -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">

                        <?php
                        $a = new GlobalArea('Global Navigation');
                        $a->display();
                        ?>

                        <div class="navbar-form loginpanel">
                            <?php
                            if (!id(new User)->isLoggedIn()) {
                                ?>
                                <a href="<?php echo URL::to('/login')?>">
                                    <button class="btn btn-light">
                                    <?php echo t('Log in') ?>
                                        </button>
                                </a>
                                <?php
                            } else {
                                $token = new Token();
                                ?>
                                <span id="ccm-account-menu-container"></span>
                                <form class="d-flex" action="<?php echo URL::to('/login', 'logout') ?>">
                                    <?php id(new Token())->output('logout'); ?>
                                    <a href="#" onclick="$(this).closest('form').submit();return false">
                                        <button class="btn btn-light">
                                            <?php echo t('Log out') ?>
                                        </button>
                                    </a>
                                </form>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="navbar-form">
                            <?php
                            $a = new GlobalArea('Global Search');
                            $a->display();
                            ?>
                        </div>



                    </div>

                </div><!-- /.container -->
            </nav>