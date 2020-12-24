<?php defined('C5_EXECUTE') or die('Access Denied.') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getThemePath() ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getThemePath() ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getStylesheet('main.css') ?>" />
        <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getThemePath() ?>/typography.css" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">	

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php Loader::element('header_required'); ?>

        <?php
        // get background from current page
        $backgroundPicture = $c->getAttribute('background');

        // no picture found, try to get it from the home page
        if (!$backgroundPicture instanceof File) {
            $homePage = Page::getByID(HOME_CID);
            $backgroundPicture = $homePage->getAttribute('background');
        }

        // call supersized if picture found
        if ($backgroundPicture instanceof File) {
            echo '<script src="' . $this->getThemePath() . '/js/supersized.core.3.2.1.min.js"></script>';
            echo "
                <script>
                $(document).ready(function() {
                    $.supersized({slides : [ {image : '{$backgroundPicture->getURL()}'} ]});

                });
                </script>
                ";
        }

        // add bootstrap JavaScript for our drop down navigation
        echo '<script src="' . $this->getThemePath() . '/js/bootstrap.min.js"></script>';
        ?>

    </head>

    <body>

        <div id="wrapper">

            <nav class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="#">concrete5 book</a>
                        <div class="nav-collapse">                    
                            <?php
                            $bt = BlockType::getByHandle('autonav');
                            $bt->controller->displayPages = 'top';
                            $bt->controller->orderBy = 'display_asc';
                            $bt->controller->displaySubPages = 'all';
                            $bt->controller->displaySubPageLevels = 'custom';
                            $bt->controller->displaySubPageLevelsNum = 2;
                            $bt->render('templates/bootstrap');
                            ?>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
