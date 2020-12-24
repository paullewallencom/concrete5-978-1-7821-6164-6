<?php defined('C5_EXECUTE') or die('Access Denied.') ?>

<?php
$this->inc('elements/header.php');
?>

<div class="row-fluid">
    <div class="span12 well">
        <?php
        Loader::element('system_errors', array('error' => $error));
        ?>  
        <?php $form = Loader::helper('form'); ?>

        <?php if (isset($intro_msg)) { ?>
            <div class="alert-message block-message success"><p><?php echo $intro_msg ?></p></div>
        <?php } ?>

        <div class="row">
            <div class="span10 offset1">
                <div class="page-header">
                    <h1><?php echo t('Sign in to %s', SITE) ?></h1>
                </div>
            </div>
        </div>

        <?php if ($passwordChanged) { ?>
            <div class="block-message info alert-message"><p><?php echo t('Password changed.  Please login to continue. ') ?></p></div>
        <?php } ?> 

        <?php if ($changePasswordForm) { ?>
            <p><?php echo t('Enter your new password below.') ?></p>

            <div class="ccm-form">	

                <form method="post" action="<?php echo $this->url('/login', 'change_password', $uHash) ?>"> 

                    <div class="control-group">
                        <label for="uPassword" class="control-label"><?php echo t('New Password') ?></label>
                        <div class="controls">
                            <input type="password" autofocus="autofocus" name="uPassword" id="uPassword" class="ccm-input-text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="uPasswordConfirm"  class="control-label"><?php echo t('Confirm Password') ?></label>
                        <div class="controls">
                            <input type="password" name="uPasswordConfirm" id="uPasswordConfirm" class="ccm-input-text">
                        </div>
                    </div>

                    <div class="actions">
                        <?php echo $form->submit('submit', t('Sign In') . ' &gt;') ?>
                    </div>
                </form>

            </div>
        <?php } else {
            ?>

            <form method="post" action="<?php echo $this->url('/login', 'do_login') ?>" class="form-horizontal">

                <div class="row">
                    <div class="span10 offset1">
                        <div class="row">
                            <div class="span5">

                                <fieldset>

                                    <legend><?php echo t('User Account') ?></legend>

                                    <div class="control-group">

                                        <label for="uName" class="control-label"><?php if (USER_REGISTRATION_WITH_EMAIL_ADDRESS == true) { ?>
                                                <?php echo t('Email Address') ?>
                                            <?php } else { ?>
                                                <?php echo t('Username') ?>
                                            <?php } ?></label>
                                        <div class="controls">
                                            <input type="text" autofocus="autofocus" name="uName" id="uName" <?php echo (isset($uName) ? 'value="' . $uName . '"' : ''); ?> class="ccm-input-text">
                                        </div>

                                    </div>
                                    <div class="control-group">

                                        <label for="uPassword" class="control-label"><?php echo t('Password') ?></label>

                                        <div class="controls">
                                            <input type="password" name="uPassword" id="uPassword" class="ccm-input-text" />
                                        </div>

                                    </div>
                                </fieldset>


                            </div>
                            <div class="span4 offset1">

                                <fieldset>

                                    <legend><?php echo t('Options') ?></legend>

                                    <?php if (isset($locales) && is_array($locales) && count($locales) > 0) { ?>
                                        <div class="control-group">
                                            <label for="USER_LOCALE" class="control-label"><?php echo t('Language') ?></label>
                                            <div class="controls"><?php echo $form->select('USER_LOCALE', $locales) ?></div>
                                        </div>
                                    <?php } ?>

                                    <div class="control-group">
                                        <label class="checkbox"><?php echo $form->checkbox('uMaintainLogin', 1) ?> <span><?php echo t('Remain logged in to website.') ?></span></label>
                                    </div>
                                    <?php $rcID = isset($_REQUEST['rcID']) ? Loader::helper('text')->entities($_REQUEST['rcID']) : $rcID; ?>
                                    <input type="hidden" name="rcID" value="<?php echo $rcID ?>" />

                                </fieldset>
                            </div>
                            <div class="span10">
                                <div class="actions">
                                    <?php echo $form->submit('submit', t('Sign In') . ' &gt;', array('class' => 'primary')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <a name="forgot_password"></a>

            <form method="post" action="<?php echo $this->url('/login', 'forgot_password') ?>" class="form-horizontal">
                <div class="row">
                    <div class="span10 offset1">

                        <h3><?php echo t('Forgot Your Password?') ?></h3>

                        <p><?php echo t("Enter your email address below. We will send you instructions to reset your password.") ?></p>

                        <input type="hidden" name="rcID" value="<?php echo $rcID ?>" />

                        <div class="control-group">
                            <label for="uEmail" class="control-label"><?php echo t('Email Address') ?></label>
                            <div class="controls">
                                <input type="text" name="uEmail" value="" class="ccm-input-text">
                            </div>
                        </div>

                        <div class="actions">
                            <?php echo $form->submit('submit', t('Reset and Email Password') . ' &gt;') ?>
                        </div>

                    </div>
                </div>	
            </form>


        <?php } ?>

    </div>  
</div>

<?php
$this->inc('elements/footer.php');
?>
