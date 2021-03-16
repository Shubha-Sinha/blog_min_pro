<?php include_once('admin_header.php'); ?>
<?php if ($user = $this->session->flashdata('user')) {
    $msg_class = $this->session->flashdata('msg_class') ?>
    <div class="<?= $msg_class ?> alert-dismissible fade show" role="alert">
        <strong><?= $user ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<!-- ////////////// FORM START ////////////////// -->
<div class="mt-3">
    <h3 class="my-3">Admin register</h3>
    <?php echo form_open('Admin/formData'); ?>

    <div class="mb-3 ">
        <label for="" class="form-label">First Name</label>
        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'First name', 'name' => 'fname', 'value' => set_value('fname')]); ?>
        <p class="mt-1"><?php echo form_error('fname'); ?></p>

    </div>

    <div class="mb-3 ">
        <label for="" class="form-label">Last Name</label>
        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Last name', 'name' => 'lname', 'value' => set_value('lname')]); ?>
        <p class="mt-1"><?php echo form_error('lname'); ?></p>

    </div>

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

    <div class="mb-3 ">
        <label for="" class="form-label">Email</label>
        <?php echo form_input(['type' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'name' => 'email', 'value' => set_value('email')]) ?>
        <p class="mt-1"><?php echo form_error('email'); ?></p>
    </div>

    <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit']); ?>

</div>
<!-- ////////////// FORM END ////////////////// -->
<?php include_once('admin_footer.php'); ?>