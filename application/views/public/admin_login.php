<?php include('public_header.php'); ?>
<div class="container">
	<?php echo form_open('login/admin_login'); ?>
	<?php echo form_fieldset('Admin Login'); ?>
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
   <?php if($error=$this->session->flashdata('login_failed')) : ?>
  <div class="row">
      <div class="col-lg-6">
        <div class="alert alert-dismissible alert-warning">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Warning!</h4>
          <p class="mb-0"> <?php echo $error; ?></p>
        </div>
      </div>
    </div>
  <?php endif ?>

    <div class="row">
    	<div class="col-lg-6">
    		<div class="form-group">
      			<?php echo form_label('Username', 'uname'); ?>
      			<?php echo form_input(['name'=>'uname', 'class'=>'form-control', 'placeholder'=>'Enter Username', 'value'=>set_value('uname')]); ?>
    		</div>
    	</div>
    	<div class="col-lg-6">
    		<?php echo br(2).form_error('uname'); ?>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-lg-6">
    		<div class="form-group">
       			<?php echo form_label('Password', 'pass'); ?>
       			<?php echo form_password(['name'=>'pass', 'class'=>'form-control', 'placeholder'=>'Password']); ?>
    		</div>
   		</div>
   		<div class="col-lg-6">
   			<?php echo br(2).form_error('pass'); ?>
   		</div>
    </div>
    <button  type="button" class="btn btn-secondary"><?php echo anchor('login/register','Register'); ?></button>
	<?php echo form_submit(['name'=>'login', 'value'=> 'Login', 'class'=>'btn btn-primary']); ?>
	<?php echo form_fieldset_close(); ?>
	<?php form_close('</div>'); ?>
<?php include('public_footer.php'); ?>