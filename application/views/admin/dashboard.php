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
        position: relative;
    }
    .fa-stack{
        position: absolute;
        top:10px;
        text-decoration:none;
    }
    .action{
        opacity: 0;
    }
    .block:hover .action{
        opacity: 1;
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


    <div class="header container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-6">
                <a class="pull-right" style="margin-right: 50px;" href="<?= base_url("admin/add_article");?>" title="Add New Article">
                        <span>
                            <i class="fa fa-plus-square fa-2x" style="color: #3B3738;"></i>
                        </span>
                </a>
            </div>
        </div>
            <?php if($feedback = $this->session->flashdata('feedback')):
                        $feedback_class = $this->session->flashdata('feedback_class');
            ?>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="alert alert-dismissible <?= $feedback_class; ?>"  style="margin-top: -40px;">
                            <?php echo $feedback; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
    </div>

    <div class="container" style="margin-top: 70px;">
        <?php if(count($articles)):
                $count = $this->uri->segment(3);
                $i = 0;
                foreach($articles as $article):
                    $i+=1;
                    ?>
                <div class="block" id="<?= "item".$i;?>">
                    <a class="action" href="<?= base_url("admin/edit_article/{$article->id}");?>" title="Edit an Article">
                        <span class="fa-stack" style="left:10px;">
                            <i class="fa fa-square fa-stack-2x" style="color: #FDF3E7;"></i>
                            <i class="fa fa-pencil-square fa-lg fa-stack-1x" style="color: #3B3738;"></i>
                        </span>
                    </a>

                    <a class="action" href="<?= base_url("admin/delete_article/{$article->id}");?>" title="Delete an Article">
                        <span class="fa-stack" style="right:10px;">
                            <i class="fa fa-square fa-stack-2x" style="color: #FDF3E7;"></i>
                            <i class="fa fa-trash fa-lg fa-stack-1x" style="color: #3B3738;"></i>
                        </span>
                    </a>

                        <img src="<?= base_url('uploads').'/'.$article->image_path?>" style="width: 260px;height: auto;border-top-right-radius: 6px;border-top-left-radius: 6px;">
                        <div class="row">
                            <div class="col-lg-12" style="text-align: center;">
                                <br>
                                <h4><?= anchor("user/article/{$article->id}",$article->title,['style'=>'text-decoration:none']);?></h4>
                                <hr>
                                <p><?= strip_tags(substr($article->body,0,40)).'...';?></p>
                            </div>
                        </div>
                </div>
                <?php endforeach; ?>
            <?php else:?>
                    No records found.
            <?php endif; ?>
    </div>

    <div style="text-align: center;">
       <?= $this->pagination->create_links(); ?>
    </div>
<?php include('admin_footer.php'); ?>
<script src="https://npmcdn.com/masonry-layout@4.0.0/dist/masonry.pkgd.min.js"></script>
<script>
    $(window).load(function() {
        $('.container').masonry({
            columnWidth :'div.block',
            itemSelector: 'div.block'
        }).masonry('reload');
    });
</script>