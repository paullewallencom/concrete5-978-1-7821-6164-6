<?php defined('C5_EXECUTE') or die('Access Denied.') ?>

<?php
$this->inc('elements/header.php');
?>

<div class="row-fluid">
    <div class="span9 well">
            <?php
            $areaMain = new Area('Main');
            $areaMain->display($c);
            ?>                  
    </div>
    <div class="span3 well">
        <div class="sidebar-nav">
            <?php
            $areaSidebar = new Area('Sidebar');
            $areaSidebar->display($c);
            ?>
        </div>
    </div>    
</div>

<?php
$this->inc('elements/footer.php');
?>
