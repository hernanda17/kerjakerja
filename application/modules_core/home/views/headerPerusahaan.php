<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html > <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kerja Enak | Searching Jobs</title> 
        <meta name="description" content="kerjaku">
        <meta name="author" content="Hernanda">
        <meta name="keyword" content="html, css, bootstrap, job-board">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/fontello.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/animate.css">        
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/owl.transitions.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/responsive.css">
        <script src="<?php echo base_url(); ?>asset/home/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>

    
        <!-- Body content -->
		
        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8 col-xs-8">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="icon-cloud"></i>Cari Kerja Enak Disini aja !</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-3  col-xs-offset-1">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url(); ?>"><h1>Kerja Enak</h1></a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <div class="button navbar-right">
              <?php $sess = $this->session->userdata('logged_in_perusahaan'); if($sess["validated"]==1)
			  {?>
                  <ul class="nav pull-right">
					<li class="dropdown">
					<a class="dropdown-toggle navbar-btn nav-button" href="#" data-toggle="dropdown"><?php echo $sess["name"];?><strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
							<a  href="<?php echo base_url(); ?>index.php/home/profilePerusahaan" class="btn btn-primary btn-block" >My Profile</a>
                            <a  href="<?php echo base_url(); ?>index.php/home/lowongan" class="btn btn-primary btn-block" >My Lowongan</a>
                            <a  href="<?php echo base_url(); ?>index.php/home/daftar" class="btn btn-primary btn-block" >My Message</a>
                            <a  href="<?php echo base_url(); ?>index.php/home/do_logout" class="btn btn-primary btn-block" >Sign Out</a>
                            <label class="string optional" for="user_remember_me"></label>
						</div>
					</li>
				</ul>
                <?php } else { ?>
                 <ul class="nav pull-right">
					<li class="dropdown">
					<a class="navbar-btn nav-button" href="#" data-toggle="dropdown">Login Terlebih Dahulu</a>
						
					</li>
                <?php } ?>
              </div>
              <ul class="main-nav nav navbar-nav navbar-right">
                <li><a class="active" href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/home/listKerja">Job Seekers</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/home/perusahaan">Perusahaan</a></li>
              </ul>
            </div>
          </div>
        </nav>