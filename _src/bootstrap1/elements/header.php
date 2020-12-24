<?php defined('C5_EXECUTE') or die('Access Denied.') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getStyleSheet('main.css') ?>" />
            <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getThemePath() ?>/css/bootstrap.min.css" />

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php Loader::element('header_required'); ?>

    </head>

    <body>

        <div id="wrapper">
            <nav class="navbar">
                <div class="navbar-inner">
                <?php
                $areaNav = new Area('Header Nav');
                $areaNav->display($c);
                ?>
                </div>
            </nav>
        </div>

        <div class="container-fluid">
