<?php include('public_header.php'); ?>
<div class="container">
  <?php echo form_open('login/register'); ?>
  <fieldset>
    <legend>Registration</legend>
    <?php if($notification=$this->session->flashdata('notification')) : 
    $class=$this->session->flashdata('notification_class');?>

  <div class="row">
      <div class="col-lg-6">
        <div class="alert alert-dismissible <?php echo $class; ?>">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Notification!</h4>
          <p class="mb-0"> <?php echo $notification; ?></p>
        </div>
      </div>
    </div>
  <?php endif ?>
    <div class="row">
      <div class="col-lg-6">
    <div class="form-group">
      <label>First Name</label>
      <input type="name" name="fname" class="form-control"  aria-describedby="emailHelp" placeholder="Enter First Name" value="<?php echo set_value('fname') ?>">
    </div>
  </div>
  <div class="col-lg-6">
        <?php echo br(2).form_error('fname'); ?>
      </div>
</div>
<div class="row">
      <div class="col-lg-6">
    <div class="form-group">
      <label>Last Name</label>
      <input type="name" name="lname" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Last Name" value="<?php echo set_value('lname') ?>">
    </div>
  </div>
  <div class="col-lg-6">
        <?php echo br(2).form_error('lname'); ?>
      </div>
</div>
<div class="row">
      <div class="col-lg-6">
    <div class="form-group">
      <label>Username</label>
      <input type="name" name="uname" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Username" value="<?php echo set_value('uname') ?>">
    </div>
  </div>
  <div class="col-lg-6">
        <?php echo br(2).form_error('uname'); ?>
      </div>
</div>
<div class="row">
      <div class="col-lg-6">
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
  </div>
  <div class="col-lg-6">
        <?php echo br(2).form_error('pass'); ?>
      </div>
</div>
<div class="row">
      <div class="col-lg-6">
<div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input type="password" name="cpass" class="form-control" id="exampleInputPassword1" placeholder="Re-enter Password">
    </div>
  </div>
  <div class="col-lg-6">
        <?php echo br(2).form_error('cpass'); ?>
      </div>
</div>
    <button type="submit" class="btn btn-primary">Register</button>
  </fieldset>
<?php echo form_close(); ?>
</div>
<?php include('public_footer.php'); ?>