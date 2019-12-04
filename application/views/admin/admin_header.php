<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <?= link_tag('assets/css/bootstrap.min.css') ?>
        
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <button class="btn btn-secondary" >
       <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
    </ul>
      </button>
    </nav>