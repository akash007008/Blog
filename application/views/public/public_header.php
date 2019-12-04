<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<?= link_tag('assets/bootstrap.min.css') ?>
	</head>
	<body>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="<?php echo base_url('user'); ?>">Articles</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <?php echo form_open('user/search',['class'=>'form-inline my-2 my-lg-0']); ?>
        <!--<form class="form-inline my-2 my-lg-0">-->
          <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        <?php echo form_close(); ?>
     <?php echo "&nbsp &nbsp ".form_error('query','<p class="navbar-text text-danger">','</p>'); ?>
     <button class="btn btn-secondary">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
    </ul>
  </button>
      </div>
     
    </nav>