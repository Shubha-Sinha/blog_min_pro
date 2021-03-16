<?php include_once('admin_header.php');
?>
<?php if ($msg = $this->session->flashdata('msg')) {
    $msg_class = $this->session->flashdata('msg_class') ?>
    <div class="<?= $msg_class ?> alert-dismissible fade show" role="alert">
        <strong><?= $msg ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<div class="mt-3">
    <?php echo anchor('Admin/add_blog', 'Add Blog', 'class = "btn btn-primary"'); ?>
</div>
<h3 class="mt-2">Blog list</h3>
<!-- ////////// TABLE //////////// -->
<div class="mt-3">
    <table class="table table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">SL</th>
                <th scope="col">Blog Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php if (count($blogs)) {
                $sl = $this->uri->segment(3); //use for sl number.
                // print_r($sl);
                foreach ($blogs as $key) { ?>
                    <tr class="table-primary">
                        <th scope="row"> <?php echo ++$sl; ?> </th>
                        <td><?php echo $key->blog_title; ?></td>
                        <td>
                            <!-- <a href="" class="btn btn-outline-primary">Edit</a> -->
                            <form action=" <?= base_url('/Admin/edit_blog') ?> " method="post">
                                <input type="hidden" name="blog_id" value="<?= $key->blog_id; ?>">
                                <input type="submit" class="btn btn-outline-primary" value="Edit">
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url('/Admin/delete_blog') ?>" method="post">
                                <input type="hidden" name="blog_id" value="<?= $key->blog_id; ?>">
                                <input type="submit" class="btn btn-outline-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php
                }
            } else { ?>
                <tr>
                    <td colspan="3">Data not available.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php echo $this->pagination->create_links();
    ?>
</div>

<?php include_once('admin_footer.php'); ?>