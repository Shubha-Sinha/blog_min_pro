<?php include_once('admin_header.php'); ?>
<!-- ////////////// FORM START ////////////////// -->
<div class="mt-3">
    <h3 class="my-3">Edit Blog</h3>
    <?php echo form_open('Admin/update_blog'); ?>

    <?php echo form_hidden('blog_id', $blog->blog_id); ?>
    <div class="mb-3 ">
        <label for="" class="form-label">Blog Title</label>
        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Blog Title', 'name' => 'blog_title', 'value' => set_value('blog_title', $blog->blog_title)]); ?>
        <p class="text-danger mt-1"><?php echo form_error('blog_title'); ?></p>
    </div>
    <div class="mb-3 ">
        <label for="exampleInputPassword1" class="form-label">Blog Area</label>
        <?php echo form_textarea(['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Write your Blog..', 'name' => 'blog_content', 'value' => set_value('blog_content', $blog->blog_content)]) ?>
        <p class="text-danger mt-1"><?php echo form_error('blog_content'); ?></p>
    </div>
    <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Add']); ?>


</div>
<!-- ////////////// FORM END ////////////////// -->
<?php include_once('admin_footer.php'); ?>