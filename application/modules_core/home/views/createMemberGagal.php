<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html > <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kerja Ku | Searching Jobs</title> 
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
                                <span><i class="icon-cloud"></i>Cari Kerja Disini aja !</span>
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
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><h1>KerjaKu.Com</h1></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <div class="button navbar-right">
                  <ul class="nav pull-right">
					<li class="dropdown">
					<a class="dropdown-toggle navbar-btn nav-button" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
							<form method="post" action="login" accept-charset="UTF-8">
                            <label class="string optional" for="user_remember_me"> Username: </label>
								<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                                <label class="string optional" for="user_remember_me"> Password: </label>
								<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
								
								<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                                <a  href="<?php echo base_url(); ?>index.php/home/daftar" class="btn btn-primary btn-block" >CREATE ACCOUNT</a>
                                <label class="string optional" for="user_remember_me"></label>
							</form>
						</div>
					</li>
				</ul>
                 
              </div>
              <ul class="main-nav nav navbar-nav navbar-right">
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">Job Seekers</a></li>
                <li><a href="#">Employeers</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
       
       <div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
            	<h5>Create Account Gagal</h5>
                <h2>Silahkan coba Lagi!</h2>
            </div>
       </div>
       
       <div class="footer-area">
            <div class="container">
                <div class="row footer">
                    <div class="col-md-4">
                        <div class="single-footer">
                            <h1>KerjaKu.Com</h1>
                            <p>KerjaKu Adalah situs Pencari kerja dan pencari pekerja.</div>
                    </div>
                    
                    <div class="col-md-5">
                        <div class="single-footer">
                            <h4>Useful lnks</h4>
                            <div class="footer-links">
                                <ul class="list-unstyled">
                                    <li><a href="">About Us</a></li>
                                    <li><a href="" class="active">Services</a></li>
                                    <li><a href="">Work</a></li>
                                    <li><a href="">Our Blog</a></li>
                                    <li><a href="">Customers Testimonials</a></li>
                                    <li><a href="">Affliate</a></li>
                                    <li><a href="">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
		
		
		
		
		
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>asset/home/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url(); ?>asset/home/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/home/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/home/js/wow.js"></script>
        <script src="<?php echo base_url(); ?>asset/home/js/main.js"></script>
    </body>
</html>
