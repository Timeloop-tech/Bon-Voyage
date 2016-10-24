<?php include('public_header.php'); ?>
<div class="container">
    <?php echo form_open_multipart('login/user_signUp',['class'=>'form-horizontal']); ?>
    <fieldset>
        <legend>Sign Up</legend>
        <?php if($error = $this->session->flashdata('user_exist')): ?>
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
                    <label class="col-lg-3 control-label">First name</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'fname','class'=>'form-control','value'=>set_value('fname'),'placeholder'=>'Firstname','autofocus'=>'autofocus']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('fname',"<div class='text-success'>","</div>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'lname','class'=>'form-control','value'=>set_value('lname'),'placeholder'=>'Lastname']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('lname',"<div class='text-success'>","</div>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">User name</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'uname','class'=>'form-control','id'=>'inputEmail','value'=>set_value('uname'),'placeholder'=>'Username']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('uname',"<div class='text-success'>","</div>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-9">
                        <?php echo form_password(['name'=>'pword','class'=>'form-control','id'=>'inputPassword','placeholder'=>'Password']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('pword',"<span class='text-success'>","</span>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">User Title</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'title','class'=>'form-control','value'=>set_value('title'),'placeholder'=>'User Title']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('title',"<div class='text-success'>","</div>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Avatar</label>
                    <div class="col-lg-9">
                        <?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php if($error = $this->session->flashdata('upload_failed')) echo $error; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
                form_submit(['name'=>'submit','value'=>'Sign Up','class'=>'btn btn-primary']); ?>
            </div>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
<?php include('public_footer.php'); ?>
