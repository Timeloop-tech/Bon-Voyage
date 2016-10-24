<?php include_once('admin_header.php'); ?>
<div class="container">
    <?php echo form_open_multipart('admin/update_password',['class'=>'form-horizontal']); ?>
    <fieldset>
        <legend>Change Password</legend>
        <?php if($error = $this->session->flashdata('invalid_password')): ?>
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
                    <label class="col-lg-4 control-label">Old Password</label>
                    <div class="col-lg-8">
                        <?php echo form_password(['name'=>'old_pwd','class'=>'form-control','value'=>set_value('old_pwd'),'placeholder'=>'Current Password','autofocus'=>'autofocus']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('old_pwd',"<div class='text-success'>","</div>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">New Password</label>
                    <div class="col-lg-8">
                        <?php echo form_password(['name'=>'new_pwd','class'=>'form-control','value'=>set_value('new_pwd'),'placeholder'=>'New Password']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('new_pwd',"<div class='text-success'>","</div>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Re-enter New Password</label>
                    <div class="col-lg-8">
                        <?php echo form_password(['name'=>'re_pwd','class'=>'form-control','value'=>set_value('re_pwd'),'placeholder'=>'Re-enter New Password']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('re_pwd',"<div class='text-success'>","</div>"); ?>
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
                form_submit(['name'=>'submit','value'=>'submit','class'=>'btn btn-primary']); ?>
            </div>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
<?php include('admin_footer.php'); ?>

