<?php include('admin_header.php'); ?>

<div class="container">
	
<h1><?php echo $articles->title; ?></h1>
<hr>
<?php if(!is_null($articles->image)) : ?>
<img src="<?php echo base_url('uploads/'.$articles->image)?>" alt=""  style=" width:250px; height:250px;" >
<?php  endif; ?>
<br/>
<blockquote class="blockquote">
<p class="mb-0">
<?php echo $articles->body; ?>
</p>
<footer class="blockquote-footer">Published on : <cite title="Source Title"><?php echo $articles->date; ?></cite></footer>
</div>
</blockquote>
<?php include('admin_footer.php'); ?>
