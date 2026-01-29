<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BLOG_REFLECTION
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
    

<!-- subscribs popup ends  -->
<?php $blog_reflection_theme_color_mode = get_theme_mod('default_color_mode', 'light'); ?>
<?php
if ($blog_reflection_theme_color_mode == 'dark') {
    blog_reflection_call_dark_mode();
    ?>
<?php } ?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>N2 Lab - Contact Us</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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


	<script type="text/javascript" >
		// <!-- start main_menu -->
		// $.get("main_menu.html", function(data){
		// 	$("#main_menu").replaceWith(data);
		// });

		$(document).ready(function() {
                $('#fade-in').delay(1000).fadeIn('slow')
		});
	
		// <!-- start footer -->
		$.get("/footer.html", function(data){
			$("#footer").replaceWith(data);
		});

		// <!-- start caseStudy -->
		$.get("/case_study.html", function(data){
			$("#case_study").replaceWith(data);
		});

		// <!-- start process -->
		$.get("/process.html", function(data){
			$("#process").replaceWith(data);
		});

	</script>


	<!--==================================================-->
	<!----- End repeat navi footer Script----->
	<!--==================================================-->
	
</head>

<?php wp_body_open(); ?>

    
