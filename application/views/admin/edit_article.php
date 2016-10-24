<?php include_once('admin_header.php'); ?>
<div class="container">
    <?php echo form_open_multipart("admin/update_article/{$article->id}",['class'=>'form-horizontal']); ?>
    <fieldset>
        <legend>Edit article</legend>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Article Title</label>
                    <div class="col-lg-8">
                        <?php echo form_input(['name'=>'title','class'=>'form-control','value'=>set_value('title',$article->title),'placeholder'=>'Article Title','autofocus'=>'autofocus']); ?>
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
                    <label class="col-lg-4 control-label">Article Body</label>
                    <div class="col-lg-8">
                        <?php echo form_textarea(['name'=>'body','class'=>'form-control','value'=>set_value('body',$article->body),'placeholder'=>'Article Body']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('body',"<span class='text-success'>","</span>"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Article Image</label>
                    <div class="col-lg-8">
                        <img src="<?= base_url('uploads/'.$article->image_path)?>" style="width: 250px;height: 170px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">New Image</label>
                    <div class="col-lg-8">
                        <?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('userfile',"<span class='text-muted'>","</span>"); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
                form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']); ?>
            </div>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
<?php include_once('admin_footer.php'); ?>
