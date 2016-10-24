<?php include_once('admin_header.php'); ?>
<div class="container">
    <?php echo form_open_multipart('admin/update_profile',['class'=>'form-horizontal']); ?>
    <?php echo form_hidden('old_pic',$user->profile_photo);?>
    <fieldset>
        <legend>Edit Your Profile</legend>
        <!--<?php if($error = $this->session->flashdata('login_failed')): ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-dismissible alert-danger">
                        <?php echo $error; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>-->

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'fname','class'=>'form-control','value'=>set_value('fname',$user->fname),'placeholder'=>'Firstname','autofocus'=>'autofocus']); ?>
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
                        <?php echo form_input(['name'=>'lname','class'=>'form-control','value'=>set_value('lname',$user->lname),'placeholder'=>'Lastname']); ?>
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
                    <label class="col-lg-3 control-label">User Title</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'title','class'=>'form-control','value'=>set_value('title',$user->title),'placeholder'=>'User Title']); ?>
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
                        <img name="old_pic" src="<?= base_url('profile_photos/'.$user->profile_photo);?>" style="width: 250px;height: 170px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">New Avatar</label>
                    <div class="col-lg-9">
                        <?php echo form_upload(['name'=>'profile_photo','class'=>'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php if(isset($upload_error)) echo $upload_error;  ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
                form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']); ?>
            </div>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
<?php include('admin_footer.php'); ?>

