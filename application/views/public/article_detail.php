<?php include('public_header.php'); ?>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-9">
                        <h2><?= $article->title ?></h2>
                    </div>
                    <div class="col-lg-3">
                        <span class="pull-right">
                            <?= date('d M y H:i:s',strtotime($article->created_at)); ?>
                        </span>
                    </div>
                </div>
                <hr/>
                <div class="col-lg-6">
                    <?php if(! is_null($article->image_path)): ?>
                        <img src="<?= base_url('uploads/'.$article->image_path); ?>" class="img-responsive img-thumbnail" style="width: 100%;" alt="">
                    <?php endif;?>
                </div>
                <p style="text-align: justify;">
                    <?= $article->body ?>
                </p>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-5">
                            <img src="<?= base_url('profile_photos').'/'.$login->profile_photo; ?>" class="pull-right img-circle" style="height: 80px;width: 100px;">
                        </div>
                        <div class="col-lg-7">
                            <p style="margin-bottom: 5px;font-size: medium;"><?= $login->fname." ".$login->lname; ?></p>
                            <hr style="margin: 0;">
                            <p style="font-size: medium;"><?= $login->title; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('public_footer.php'); ?>
