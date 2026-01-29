<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
   <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   <?php wp_head(); ?>

   <!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="/assets/images/fav-icon/N2_icon.png">
	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" media="all" />
	<!-- carousel CSS -->
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css" type="text/css" media="all" />	
	<!-- nivo-slider CSS -->
	<link rel="stylesheet" href="/assets/css/nivo-slider.css" type="text/css" media="all" />
	<!-- animate CSS -->
	<link rel="stylesheet" href="/assets/css/animate.css" type="text/css" media="all" />	
	<!-- animated-text CSS -->
	<link rel="stylesheet" href="/assets/css/animated-text.css" type="text/css" media="all" />	
	<!-- font-awesome CSS -->
	<link type="text/css" rel="stylesheet" href="/assets/fonts/font-awesome/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="/assets/fonts/font-awesome/css/brands.css">
	<!-- font-flaticon CSS -->
	<link rel="stylesheet" href="/assets/css/flaticon.css" type="text/css" media="all" />	
	<!-- theme-default CSS -->
	<link rel="stylesheet" href="/assets/css/theme-default.css" type="text/css" media="all" />
	<link rel="stylesheet" href="/assets/css/all.min.css" type="text/css" media="all" />		
	<!-- meanmenu CSS -->
	<link rel="stylesheet" href="/assets/css/meanmenu.min.css" type="text/css" media="all" />	
	<!-- Main Style CSS -->
	<link rel="stylesheet"  href="/style.css" type="text/css" media="all" />
	<!-- transitions CSS -->
	<link rel="stylesheet" href="/assets/css/owl.transitions.css" type="text/css" media="all" />
	<!-- venobox CSS -->
	<link rel="stylesheet" href="/venobox/venobox.css" type="text/css" media="all" />
	<!-- widget CSS -->
	<link rel="stylesheet" href="/assets/css/widget.css" type="text/css" media="all" />
	<!-- settings CSS -->
	<link rel="stylesheet" href="/assets/css/settings.css" type="text/css" media="all" />
	<!-- responsive CSS -->
	<link rel="stylesheet" href="/assets/css/responsive.css" type="text/css" media="all" />
	<style type="text/css">
	body,td,th {
		font-family: Muli, sans-serif;
	}
	h1,h2,h3,h4,h5,h6 {
		font-family: Muli, sans-serif;
	}
    </style>
	<!-- modernizr js -->	
	<script type="text/javascript" src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>

		<!--==================================================-->
	<!----- Start repeat navi footer Script----->
	<!--==================================================-->
	
	<!-- <script src="//code.jquery.com/jquery.min.js"></script> -->
	<!-- <script type="text/javascript" src="assets/js/vendor/jquery-3.2.1.min.js"></script> -->
	<script type="text/javascript" src="/assets/js/accordion/jquery-3.4.1.min.js"></script>
	
	<script>
		// <!-- start main_menu -->
		// $.get("main_menu.html", function(data){
		// 	$("#main_menu").replaceWith(data);
		// });

		$(document).ready(function() {
            $('#fade-in').delay(1000).fadeIn('slow')
		});
	
		// <!-- start footer -->
		$.get("footer.html", function(data){
			$("#footer").replaceWith(data);
		});

		// <!-- start caseStudy -->
		$.get("case_study.html", function(data){
			$("#case_study").replaceWith(data);
		});

		// <!-- start process -->
		$.get("process.html", function(data){
			$("#process").replaceWith(data);
		});

		
	</script>


	<!--==================================================-->
	<!----- End repeat navi footer Script----->
	<!--==================================================-->
</head>


<!-- <header class="my-logo">
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="/assets/images/N2Lab_PartnerLogo.png" alt="Site Logo" width="50px" height="50px"></a></h1>
</header> -->

<!-- <?php wp_nav_menu( array( 'header-menu' => 'header-menu' ) ); ?> -->