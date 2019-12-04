<?php include('public_header.php'); $i=$this->uri->segment(3)+1;?>

<div class="container">
	<h1>All Articles</h1>
	<hr>
	<table class="table">
		<thead>
			<th>S.No.</th>
			<th>Article Title</th>
			<th>Published On</th>
		</thead>
		<tbody>
			<?php if (count($articles)): ?>
				<?php foreach ($articles as $article): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<?php $temp=$article->id; ?>
			<td><?php echo anchor('user/article/'.$temp,$article->title); ?></td>
			<td><?php echo date('d/H/y H:i:s', strtotime( $article->date)); ?></td>
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
<?php include('public_footer.php'); ?>