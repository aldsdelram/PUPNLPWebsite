<!doctype html>

<html>
        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="NLP Group">

             <title>NLPTOOLS</title>
             <link rel="stylesheet" href="/public/stylesheets/bootstrap.css">
             <link rel="stylesheet" href="/public/stylesheets/style.css">

             <style>
             	.head{
             		margin-top: -0.2em;
             		padding-top: 0;
             		margin-bottom: 0;
             		padding-bottom: 0;
             	}
             </style>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/public/js/jquery.js"><\/script>')</script>
    <script src="/public/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/public/js/ie10-viewport-bug-workaround.js"></script>

        </head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header maroon">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand maroon" href="<?php echo base_url('welcome');?>">PUP-CCIS NLP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url('home');?>">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#contact">Researchers</a></li>
            <li><a href="<?php echo base_url('/publication'); ?>">Publications</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              if(empty($this->session->userdata('id'))){
                echo'<li><a href="register">Register</a></li>
                <li class="active"><a href="login">Login</a></li>';
              }
              else{
                echo'<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.
                $this->session->userdata('user_info')['first_name'].' '.$this->session->userdata('user_info')['last_name'].'<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="'.base_url('users/update').'">Update Info</a></li>
                  <li><a href="'.base_url('logout').'">Logout</a></li>
                </ul>
              </li>';
              }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>