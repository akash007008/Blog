<?php include('admin_header.php'); ?>
<div class="container">
	<?php echo form_open_multipart('admin/store_article'); ?>
	<?php echo form_fieldset('Add Article'); ?>
  
    <div class="row">
    	<div class="col-lg-6">
    		<div class="form-group">
            <?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
             <?php echo form_hidden('date', date('Y-m-d H:i:s')); ?>
      			<?php echo form_label('Article Title', 'title'); ?>
      			<?php echo form_input(['name'=>'title','class'=>'form-control', 'placeholder'=>'Enter Article Title', 'value'=>set_value('title')]); ?>
    		</div>
    	</div>
    	<div class="col-lg-6">
    		<?php echo br(2).form_error('title'); ?>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-lg-6">
    		<div class="form-group">
       			<?php echo form_label('Article Body', 'body'); ?>
       			<?php echo form_textarea([ 'name'=>'body', 'class'=>'form-control', 'placeholder'=>'Enter Article Body', 'value'=>set_value('body')]); ?>
    		</div>
   		</div>
   		<div class="col-lg-6">
   			<?php echo br(2).form_error('body'); ?>
   		</div>
    </div>
     <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
            <?php echo form_label('Upload Image', 'image'); ?>
            <?php echo form_upload(['name'=>'userfile','class'=>'form-control', 'type'=>'file','size'=>"20"]); ?>
        </div>
      </div>
      <div class="col-lg-6">
        <?php if(isset($upload_error))
                    echo br(2).$upload_error; ?>
      </div>
    </div>
	<?php echo form_reset(['name'=>'reset', 'value'=> 'Reset', 'class'=>'btn btn-secondary']).
    		form_submit(['name'=>'add_article', 'value'=> 'Submit', 'class'=>'btn btn-primary']); ?>
	<?php echo form_fieldset_close(); ?>
	<?php form_close('</div>'); ?>
<?php include('admin_footer.php'); ?>