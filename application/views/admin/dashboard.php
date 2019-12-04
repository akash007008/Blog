<?php include('admin_header.php'); 
$i=$this->uri->segment(3)+1; ?>
<div class="container">
</br>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 float-right">
			<a href="<?php echo base_url('admin/add_article'); ?>" class="btn btn-lg btn-info pull-right">Add Article</a>
		</div>
	</div>
<br/>
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
</br>
	<table class="table">
		<thead>
			<th>S.No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if (count($articles)): ?>
				<?php foreach ($articles as $article): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo anchor('admin/article/'.$article->id,$article->title); ?></td>
			<td>
				<?php echo  anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?>
				<?php echo  anchor("admin/delete_article/{$article->id}",'Delete',['class'=>'btn btn-warning']); ?>
			</td>
		</tr>
				<?php $i++; endforeach ?>
				<?php else: ?>
					<tr>
						<td colspan="3">No Records Found.</td>
					</tr>
				<?php  endif ?>
		</tbody>
	</table>


	<?php echo $this->pagination->create_links(); ?>
</div>
<?php include('admin_footer.php'); ?>
