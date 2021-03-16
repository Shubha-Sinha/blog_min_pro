<?php include_once('user_header.php'); ?>
<div class="homepage">
    <div class="mt-3" style="text-align: center;">
        <h1>Top Games list</h1>
        <p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
            "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</p>
    </div>
    <?php if (count($blog)) {
        foreach ($blog as $key) { ?>
            <div class="blog" id="myDIV">
                <h3 class=" my-3"> <?= $key->blog_title ?></h3>
                <?php if (!is_null($key->image_path)) { ?>
                    <img src="<?php echo $key->image_path ?>" class="img-fluid" alt="img" width="700" height="420">
                <?php } else { ?>
                    <img src="<?php echo base_url('img/img.png') ?>" class="img-fluid" alt="img">
                <?php } ?>
                <p class=" my-3"><?= $key->blog_content ?></p>
                <small><?= date('d m y h:i:s', strtotime($key->date_time)) ?></small>
            </div>
        <?php }
    } else { ?>
        <h2 my-5>Sorry,Blog not available.</h2>
    <?php } ?>
</div>
<?php include_once('user_footer.php'); ?>



<!--   -->