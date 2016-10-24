<?php include('public_header.php'); ?>
<style>
    html,body{
        margin: 0px;
    }

    div.container{
        margin: 0px auto 14px auto;

    }
    div.block{
        background: #d6dcd6;
        margin: 7px;
        width: 260px;
        display: inline-block;
        border-radius: 6px;
    }
    div.block h4{
        margin: 0 10px 0 10px;
        font-weight: 800;
    }
    div.block h4 a{
        color: #3B3738;
        text-decoration: none;
    }
    div.block h4 a:hover{
        color: #7E8F7C;
    }
    hr{
        margin: 10px;
        border-top: 1px solid #3B3738;
    }
</style>
<div class="container-fluid">
    <div class="container">
        <?php if( count($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div class="block">
                    <img src="<?= base_url('uploads').'/'.$article->image_path?>" style="width: 260px;height: auto;border-top-right-radius: 6px;border-top-left-radius: 6px;">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center;">
                            <br>
                            <h4><?= anchor("user/article/{$article->id}",$article->title);?></h4>
                        </div>
                    </div>
                    <hr/>

                   <?php $id = $article->user_id; ?>
                    <?php foreach($users as $user):
                        if($user['id']==$id):?>
                            <div class="row" style="padding: 15px 0 15px 0;">
                                <div class="col-lg-offset-4 col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-3">
                                                <img src="<?= base_url('profile_photos').'/'.$user['profile_photo']; ?>" class="pull-right img-circle" style="width: auto;height: 52px;">
                                            </div>
                                            <div class="col-lg-9" style="padding-left: 0px;">
                                                <p style="margin-bottom: 0px;margin-left:-1px;font-size: 15px;"><?= $user['fname']." ".$user['lname']; ?></p>
                                                <p style="margin-bottom: 0px;font-size: 13px;"><?= $user['title']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach;?>

                </div>
            <?php endforeach;?>
        <?php else: ?>
            <p>No Records Found.</p>
        <?php endif;?>
        <br/>
    </div>
</div>
<div style="text-align: center;position: relative;">
    <?= $this->pagination->create_links(); ?>
</div>

<?php include('public_footer.php'); ?>
<script src="https://npmcdn.com/masonry-layout@4.0.0/dist/masonry.pkgd.min.js"></script>
<script>
    $(window).load(function() {
        $('.container').masonry({
            columnWidth :'div.block',
            itemSelector: 'div.block'
        }).masonry('reload');
    });
</script>
