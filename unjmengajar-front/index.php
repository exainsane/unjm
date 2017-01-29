<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home | UNJ Mengajar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="img/favicon.png">
	<!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 
	<script src="js/respond.min.js"></script> <![endif]--> 		
        <!-- Place favicon.ico in the root directory -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
<body >
		 <!-- start preloader -->
        <div id="loader-wrapper">
            <div class="logo"></div>
            <div id="loader">
            </div>
        </div>
        <!-- end preloader -->
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		
<!-- Start Header Section -->
<header class="main_menu_sec navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="lft_hd">
					<span>UNJ Mengajar</span>
				</div>
			</div>			
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="rgt_hd">					
					<div class="main_menu">
						<nav id="nav_menu">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>	
						<div id="navbar">
							<ul>
								<li><a class="page-scroll" href="index.php">Home</a></li> 
								<li><a class="page-scroll" href="#abt_sec">About</a></li>
								<li><a class="page-scroll" href="#pr_sec">Service</a></li>
								<li><a class="page-scroll" href="#tm_sec">Team</a></li>
								<li><a class="page-scroll" href="#tstm_sec">Testimonial</a></li>
								<li><a class="page-scroll" href="#lts_sec">Latest Blog</a></li>
								<li><a class="page-scroll" href="#rgs_sec">Registration</a></li>
								<li><a class="page-scroll" href="login.php">Login</a></li>
								<li><a class="page-scroll" href="#ctn_sec">Contact Us</a></li>
							</ul>
						</div>		
						</nav>			
					</div>					
						
				</div>
			</div>	
		</div>	
	</div>	
</header>
<!-- End Header Section -->

<!-- start slider Section -->
<section id="slider_sec">
	<div class="container">
		<div class="row">
			<div class="slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	<?php
				  	// TODO : USE VARIABLE $slider
					include('koneksi.php');					
					$query = mysql_query("SELECT * FROM slider") or die(mysql_error());
					if(mysql_num_rows($query) == 0){
						echo '';						
					}else{
					while($data = mysql_fetch_assoc($query)){
						echo 	'<div class="'.$data['class'].'">
									<div class="wrap_caption">
									  <div class="caption_carousel">
										<h1>'.$data['judul'].'</h1>
										<p>'.$data['des'].'</p>
									  </div>						
									</div>
								</div>';
							}
						}
					?>			
				  </div>

				  <!-- Controls -->
				  <a class="left left_crousel_btn" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="fa fa-angle-left"></i>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right right_crousel_btn" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="fa fa-angle-right"></i>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>	
		</div>			
	</div>	
</section>
<!-- End slider Section -->

<!-- start about Section -->
<section id="abt_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>ABOUT</h1>
					<h2>### UNJ Mengajar ###</h2>
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="abt">
					<?php
					//TODO : USE VARIABLE $about
					include('koneksi.php');					
					$query = mysql_query("SELECT * FROM about") or die(mysql_error());
					if(mysql_num_rows($query) == 0){
						echo '';						
					}else{
					while($data = mysql_fetch_assoc($query)){
						echo $data['about'];							
						}						
					}
					?>
				</div>
			</div>			
		</div>
	</div>
</section>
<!-- End About Section -->

<!-- start Service Section -->
<section id="pr_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>OUR Service</h1>
					<h2>### UNJ Mengajar ###</h2>
				</div>			
			</div>		
			<?php
			//TODO :  USE VARIABLE $services
			include('koneksi.php');					
			$query = mysql_query("SELECT * FROM services") or die(mysql_error());
			if(mysql_num_rows($query) == 0){
				echo '';						
			}else{
			while($data = mysql_fetch_assoc($query)){
				echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="service">						
							<i class="fa fa-'.$data['icon'].'"></i>
							<h2>'.$data['judul'].'</h2>
							<div class="service_hoverly">
								<i class="fa fa-'.$data['icon'].'"></i>
								<h2>'.$data['judul'].'</h2>
								'.$data['des'].'
							</div>
						</div>
					</div>	';							
				}						
			}
			?>
		</div>
	</div>
</section>
<!-- End Service Section -->

<!-- start our team Section -->
<section id="tm_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Our Team</h1>
					<h2>### UNJ Mengajar ###</h2>
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
				<div class="all_team">
					<?php
					//TODO : USE VARIABLE $team
					include('koneksi.php');					
					$query = mysql_query("SELECT * FROM team") or die(mysql_error());
					if(mysql_num_rows($query) == 0){
						echo '';						
					}else{
					while($data = mysql_fetch_assoc($query)){
						echo 	'<div class="sngl_team">						
									<img src="'.$data['img'].'" alt=""/>	
									<h3>'.$data['nama'].'<br><span>'.$data['job'].'</span></h3>
									'.$data['des'].'						
								</div>';
							}
						}
					?>									
				</div>			
			</div>
		</div>
	</div>
</section>
<!-- End our team Section -->

<!-- start our teastimonial Section -->
<section id="tstm_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="all_tstm">
				<?php
				//TODO : USE VARIABLE $testimoni
				include('koneksi.php');					
				$query = mysql_query("SELECT * FROM testimoni") or die(mysql_error());
				if(mysql_num_rows($query) == 0){
					echo '';						
				}else{
				while($data = mysql_fetch_assoc($query)){
					echo 	'<div class="clnt_tstm">
								<div class="sngl_tstm">
									<i class="fa fa-quote-right"></i>
									<h3>'.$data['judul'].'</h3>
									'.$data['des'].'
									<h6>'.$data['nama'].'</h6>					
								</div>
							</div>';
						}
					}
				?>					
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- End our teastimonial Section -->


<!-- start Latest post Section -->
<section id="lts_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Our Latest Blog</h1>
					<h2>### UNJ Mengajar ###</h2>
				</div>			
			</div>
			<?php
			//TODO : USE VARIABLE $blog, move limit_words to string helper
			function limit_words($string, $word_limit){
			    $words = explode(" ",$string);
			    return implode(" ",array_splice($words,0,$word_limit));
			}
			
			include('koneksi.php');					
			$query = mysql_query("SELECT * FROM blog order by id Desc") or die(mysql_error());
			if(mysql_num_rows($query) == 0){
				echo '';						
			}else{
			while($data = mysql_fetch_assoc($query)){
				$limited_string = limit_words($data['des'], 20);
				echo 	'<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="lts_pst">						
								<img src="'.$data['img'].'" alt=""/>
								<h2>'.$data['judul'].'</h2>
								'.$limited_string.'...
								<a href="blog.php?id='.$data['id'].'">Read more <i class="fa fa-long-arrow-right"></i></a>					
							</div>
						</div>';
					}
				}
			?>
			<div class="post_btn">
				<div class="hover_effect_btn" id="hover_effect_btn">
					<a href="blog.php" data-hover="view more post"><span>view more post</span></a>
				</div>
			</div>			

		</div>
	</div>
</section>
<!-- End Latest post Section -->

<!-- start contact us Section -->
<section id="rgs_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Registration</h1>
					<h2>### UNJ Mengajar ###</h2>
				</div>			
			</div>		
			<div class="col-sm-6"> 
				<div id="cnt_form">
					<h2>Sebagai User</h2>
					<form id="contact-form" class="contact" name="contact-form" method="post" action="regist.php">
						<div class="form-group">
							<input type="text" name="fname" class="form-control" required="required" placeholder="First Name">
						</div>
						<div class="form-group">
							<input type="text" name="lname" class="form-control" required="required" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" required="required" placeholder="Your Email">
						</div> 
						<div class="form-group">
							<input type="text" name="username" class="form-control" required="required" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" required="required" placeholder="Your Password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Send</button>
						</div>
					</form> 
				</div>
			</div>
			<div class="col-sm-6">
				<div id="cnt_form">
					<h2>Sebagai Guru</h2>
					<form id="contact-form" class="contact" name="contact-form" method="post" action="regist.php">
						<div class="form-group">
							<input type="text" name="fname" class="form-control" required="required" placeholder="First Name">
						</div>
						<div class="form-group">
							<input type="text" name="lname" class="form-control" required="required" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" required="required" placeholder="Your Email">
						</div> 
						<div class="form-group">
							<input type="text" name="username" class="form-control" required="required" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" required="required" placeholder="Your Password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Send</button>
						</div>
					</form> 
				</div>
			</div>			
		</div>
	</div>
</section>
<!-- End contact us  Section -->

<!-- start contact us Section -->
<section id="ctn_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Contact Info</h1>
					<h2>### UNJ Mengajar ###</h2>
				</div>			
			</div>		
			<div class="col-sm-6"> 
				<div id="cnt_form">
					<form id="contact-form" class="contact" name="contact-form" method="post" action="contact.php">
						<div class="form-group">
						<input type="text" name="name" class="form-control name-field" required="required" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control mail-field" required="required" placeholder="Your Email">
						</div> 
						<div class="form-group">
							<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
						</div> 
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Send</button>
						</div>
					</form> 
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="cnt_info">
					<ul>
						<li><i class="fa fa-facebook"></i><p>UNJ Mengajar</p></li>
						<li><i class="fa fa-twitter"></i><p>@UNJ_Mengajar</p></li>
						<li><i class="fa fa-instagram"></i><p>@UNJ_Mengajar</p></li>
						<li><i class="fa fa-envelope"></i><p>info@unjmengajar.com</p></li>
						<li><i class="fa fa-phone"></i><p>+62 896 3794 6678 (Erfan Kurniawan)</p></li>
					</ul>
				</div>
			</div>			
		</div>
	</div>
</section>
<!-- End contact us  Section -->

<!-- start located map Section -->
<section id="ltd_map_sec">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="map">						
			<h1>located THE MAP</h1><a href="#slidingDiv" class="show_hide" rel="#slidingDiv"><i class="fa fa-angle-up"></i></a>
			<div id="slidingDiv">
				<div class="map_area">
					<div id="googleMap" style="width:100%;height:300px;"></div>
				</div>
			</div>	
			</div>
		</div>
	</div>
</div>
</section>

<!-- End located map  Section -->
<!-- start footer Section -->
<footer id="ft_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ft">						
					<ul>
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-instagram"></i></a></li>
						<li><a href=""><i class="fa fa-google"></i></a></li>
					</ul>					
				</div>
				<ul class="copy_right">
					<li>UNJ Mengajar &copy; 2017</li>
				</ul>					
			</div>	
		</div>
	</div>
</footer>
<!-- End footer Section -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/jquery-1.11.2.min.js"></script>

<script src="js/isotope.pkgd.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/showHide.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/scrolling-nav.js"></script>
<script src="js/plugins.js"></script>
<!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
		<script>
			function initialize() {
			  var mapOptions = {
				zoom: 14,
				scrollwheel: false,
				center: new google.maps.LatLng(-6.194170, 106.878730)
			  };
			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);
			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				animation:google.maps.Animation.BOUNCE,
				icon: 'img/map-marker.png',
				map: map
			  });
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
<script src="js/main.js"></script>

<script src="showHide.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){


   $('.show_hide').showHide({			 
		speed: 1000,  // speed you want the toggle to happen	
		easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
		changeText: 1, // if you dont want the button text to change, set this to 0
		showText: 'View',// the button text to show when a div is closed
		hideText: 'Close' // the button text to show when a div is open
					 
	}); 


});

</script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

<script>

  //Hide Overflow of Body on DOM Ready //
$(document).ready(function(){
    $("body").css("overflow", "hidden");
});

// Show Overflow of Body when Everything has Loaded 
$(window).load(function(){
    $("body").css("overflow", "visible");        
    var nice=$('html').niceScroll({
	cursorborder:"5",
	cursorcolor:"#00AFF0",
	cursorwidth:"3px",
	boxzoom:true, 
	autohidemode:true
	});

});
</script>



    </body>
</html>
