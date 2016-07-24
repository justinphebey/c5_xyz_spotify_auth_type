<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<div class="form-group">
        <span>
            <?php echo t('Attach a %s account', t('spotify')) ?>
        </span>
    <hr>
</div>
<div class="form-group">
    <a href="<?php echo \URL::to('/ccm/system/authentication/oauth2/spotify/attempt_attach'); ?>" class="btn btn-primary btn-spotify">
        <i class="fa fa-spotify"></i>
        <?php echo t('Attach a %s account', t('spotify')) ?>
    </a>
</div>

<style>
    .ccm-ui .btn-spotify {
        border-width: 0px;
        background: #3b5998;
    }
    .btn-spotify .fa-spotify {
        margin: 0 6px 0 3px;
    }
</style>
