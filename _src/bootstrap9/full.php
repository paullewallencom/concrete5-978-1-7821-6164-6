<?php defined('C5_EXECUTE') or die('Access Denied.') ?>

<?php
$this->inc('elements/header.php');
?>

<div class="row-fluid">
    <div class="span12 well">
        <?php
        $areaMain = new Area('Main');
        $areaMain->display($c);
        ?>                  
    </div>  
</div>

<?php
$this->inc('elements/footer.php');
?>
