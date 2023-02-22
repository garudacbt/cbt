<div class="login-box pt-5">
    <!-- /.login-logo -->
    <div class="login-logo">
        <a href="<?= base_url('login') ?>"><b>CBT</b>APP</a>
    </div>

    <div class="login-box-body">
        <h3 class="text-center mt-0 mb-4">
            <?php echo lang('forgot_password_heading'); ?>
        </h3>
        <p class="login-box-msg">
            <?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?>
        </p>

        <?php if ($this->session->flashdata('success')) : ?>
            <p class="text-green text-center"><?= $this->session->flashdata('success'); ?></p>
        <?php endif; ?>

        <div id="infoMessage" class="text-red text-center"><?php echo $message; ?></div>

        <?php echo form_open("auth/forgot_password"); ?>

        <p>
            <label for="identity"><?php echo(($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label>
            <br/>
            <?php echo form_input($identity); ?>
        </p>

        <p><?php echo form_submit('submit', 'Forgot Password', ['class' => 'btn btn-primary btn-flat btn-block']); ?></p>

        <?php echo form_close(); ?>

    </div>
</div>