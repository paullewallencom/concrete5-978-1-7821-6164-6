<?php defined('C5_EXECUTE') or die('Access Denied.') ?>

<?php
$this->inc('elements/header.php');
?>

<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <?php
            $areaSidebar = new Area('Sidebar');
            $areaSidebar->display($c);
            ?>
        </div>
    </div>    
    <div class="span9">
        <?php
        $areaMain = new Area('Main');
        $areaMain->display($c);
        ?>                  
    </div>
</div>

<?php
$this->inc('elements/footer.php');
?>
