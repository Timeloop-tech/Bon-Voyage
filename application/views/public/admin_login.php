<?php include('public_header.php'); ?>
<div class="container">
    <?php echo form_open('login/admin_login',['class'=>'form-horizontal']); ?>
        <fieldset>
            <legend>Login</legend>
            <?php if($error = $this->session->flashdata('login_failed')): ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-dismissible alert-danger">
                        <?php echo $error; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-3 control-label">User name</label>
                        <div class="col-lg-9">
                            <?php echo form_input(['name'=>'username','class'=>'form-control','id'=>'inputEmail','value'=>set_value('username'),'placeholder'=>'Username','autofocus'=>'autofocus']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php echo form_error('username',"<div class='text-success'>","</div>"); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-9">
                            <?php echo form_password(['name'=>'password','class'=>'form-control','id'=>'inputPassword','placeholder'=>'Password']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php echo form_error('password',"<span class='text-success'>","</span>"); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
                               form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']); ?>
                </div>
            </div>
        </fieldset>
    <?php echo form_close(); ?>
</div>
<?php include('public_footer.php'); ?>
