<?php
if (isset($error)) {
    ?>
    <div class="alert alert-danger"><?php echo $error ?></div>
<?php
}
if (isset($message)) {
    ?>
    <div class="alert alert-success"><?php echo $message ?></div>
<?php
}

$user = new User;

if ($user->isLoggedIn()) {
    ?>
    <div class="form-group">
        <span>
            <?php echo t('Attach a %s account', t('spotify')) ?>
        </span>
        <hr>
    </div>
    <div class="form-group">
        <a href="<?php echo \URL::to('/ccm/system/authentication/oauth2/spotify/attempt_attach'); ?>" class="btn btn-primary btn-spotify btn-block">
            <i class="fa fa-spotify"></i>
            <?php echo t('Attach a %s account', t('spotify')) ?>
        </a>
    </div>
<?php
} else {
    ?>
    <div class="form-group">
        <span>
            <?php echo t('Sign in with %s', t('spotify')) ?>
        </span>
        <hr>
    </div>
    <div class="form-group">
        <a href="<?php echo \URL::to('/ccm/system/authentication/oauth2/spotify/attempt_auth'); ?>" class="btn btn-primary btn-spotify btn-block">
            <i class="fa fa-spotify"></i>
            <?php echo t('Log in with %s', 'spotify') ?>
        </a>
    </div>
<?php
}
?>
<style>
    .ccm-ui .btn-spotify {
        border-width: 0px;
        background: #3b5998;
    }
    .btn-spotify .fa-spotify {
        margin: 0 6px 0 3px;
    }
</style>
