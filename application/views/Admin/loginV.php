<?php include_once('admin_header.php'); ?>
<!-- ////////////// FORM START ////////////////// -->
<?php if ($err = $this->session->flashdata('login_failed')) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?= $err ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<div class="mt-3">
    <h3 class="my-3">Admin Login</h3>
    <?php echo form_open('Admin/login'); ?>
    <div class="mb-3 ">
        <label for="" class="form-label">Username</label>
        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Username', 'name' => 'uname', 'value' => set_value('uname')]); ?>
        <p class="mt-1"><?php echo form_error('uname'); ?></p>

    </div>
    <div class="mb-3 ">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <?php echo form_password(['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'name' => 'pass', 'value' => set_value('pass')]) ?>
        <p class="mt-1"><?php echo form_error('pass'); ?></p>
    </div>
    <div class="mb-3 form-check">
        <?php echo form_checkbox(['type' => 'checkbox', 'class' => 'form-check-input', 'id' => 'rem', 'name' => 'rem']); ?>
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Login']); ?>
    <?php echo anchor('Admin/register', 'Sing Up', 'class = "link-class"'); ?>

</div>
<!-- ////////////// FORM END ////////////////// -->
<?php include_once('admin_footer.php'); ?>