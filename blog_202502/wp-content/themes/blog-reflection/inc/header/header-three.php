<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>N2 Lab - Contact Us</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="assets/images/fav-icon/N2_icon.png">
	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all" />
	<!-- carousel CSS -->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css" media="all" />	
	<!-- nivo-slider CSS -->
	<link rel="stylesheet" href="assets/css/nivo-slider.css" type="text/css" media="all" />
	<!-- animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.css" type="text/css" media="all" />	
	<!-- animated-text CSS -->
	<link rel="stylesheet" href="assets/css/animated-text.css" type="text/css" media="all" />	
	<!-- font-awesome CSS -->
	<link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/brands.css">
	<!-- font-flaticon CSS -->
	<link rel="stylesheet" href="assets/css/flaticon.css" type="text/css" media="all" />	
	<!-- theme-default CSS -->
	<link rel="stylesheet" href="assets/css/theme-default.css" type="text/css" media="all" />
	<link rel="stylesheet" href="assets/css/all.min.css" type="text/css" media="all" />		
	<!-- meanmenu CSS -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css" type="text/css" media="all" />	
	<!-- Main Style CSS -->
	<link rel="stylesheet"  href="style.css" type="text/css" media="all" />
	<!-- transitions CSS -->
	<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css" media="all" />
	<!-- venobox CSS -->
	<link rel="stylesheet" href="venobox/venobox.css" type="text/css" media="all" />
	<!-- widget CSS -->
	<link rel="stylesheet" href="assets/css/widget.css" type="text/css" media="all" />
	<!-- settings CSS -->
	<link rel="stylesheet" href="assets/css/settings.css" type="text/css" media="all" />
	<!-- responsive CSS -->
	<link rel="stylesheet" href="assets/css/responsive.css" type="text/css" media="all" />
	<style type="text/css">
	body,td,th {
    font-family: Muli, sans-serif;
}
h1,h2,h3,h4,h5,h6 {
    font-family: Muli, sans-serif;
}
    </style>
	<!-- modernizr js -->	
	<script type="text/javascript" src="assets/js/vendor/modernizr-3.5.0.min.js"></script>

		<!--==================================================-->
	<!----- Start repeat navi footer Script----->
	<!--==================================================-->
	
	<!-- <script src="//code.jquery.com/jquery.min.js"></script> -->
	<!-- <script type="text/javascript" src="assets/js/vendor/jquery-3.2.1.min.js"></script> -->
	<script type="text/javascript" src="assets/js/accordion/jquery-3.4.1.min.js"></script>


	<script type="text/javascript" >
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
<body>
	<!-- Loder Start-->
	<div class="loader-wrapper">
	  <div class="loader"></div>
	  <div class="loder-section left-section"></div>
	  <div class="loder-section right-section"></div>
	</div>
	<!-- Loder End -->
		
	<!--==================================================-->
	<!----- Start Top Menu Area Css ----->
	<!--==================================================-->
	<div class="header_top_menu pt-2 pb-2 bg_color">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-sm-8">
					<div class="header_top_menu_address">
						<div class="header_top_menu_address_inner">
							<ul>
								<li><a href="mailto:sales@n2lab.io"><i class="fa fa-envelope-o"></i>sales@n2lab.io</a></li>
								<li><a href="#"><i class="fa fa-map-marker"></i>Austin, TX | San Jose, CA | Noida, India | Singapore</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="header_top_menu_icon">
						<div class="header_top_menu_icon_inner">
							<ul>
								<li><a href="#"><i class="fa fa-phone"></i>+ 1 408 518 0368</a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End	Top Menu Area Css ----->
	<!--===================================================-->

	<!--==================================================-->
	<!----- Start Main Menu Area ----->
	<!--==================================================-->

	
	<div id="sticky-header" class="techno_nav_manu d-md-none d-lg-block d-sm-none d-none">
		<div class="container">
			<div class="row align-items-center">
				<div class="menu">
					<a href="index.html" class="logo">
						<img class="down" src="assets/images/N2Lab_PartnerLogo.png"  alt="N2 Lab logo"> 
						<img class="main_sticky" src="assets/images/N2Lab_PartnerLogo_white.png" alt="N2 Lab logo">
					</a> <!--cph-->
					<ul class="clearfix" id="fade-in">
						<li><a href="index.html">Home</a>
							
						</li>
						<li><a href="about.html">Company</a>
							<ul>
								<li><a href="about.html">About Us</a></li>
								<li><a href="ourTeam.html">Our Team</a></li>
								<li><a href="careers.html">Careers</a></li>
								<li><a href="ourPartners.html">Our Partners</a></li>
							</ul>
						</li>
						<li><a href="services.html">Services</a>
						</li>
						<li><a href="products.html">Products</a>
							<ul>
								<li><a href="products_inventoryAgingReport.html">Inventory Aging Report</a></li>
								<li><a href="products_PurchaseApprovals_23wayMatching.html">Purchase Approvals w/2-3 way Matching</a></li>
								<li><a href="products_SFTPconnector.html">SFTP Connector</a></li>
								<li><a href="products_crossSubsidiaryFulfilment.html">Cross Subsidiary Fulfillment Plus</a></li>
							</ul>
						</li>
						<li><a href="CS_highTechManufacturing.html">Our Works</a>
							<ul>
									<li><a href="CS_highTechManufacturing.html">Case Studies</a></li>
										<li><a href="ourClients.html">Our Clients</a></li>
									</ul>
								</li>			
						<li><a href="contact.html">Contact Us</a>
						</li>
						
						<!-- <div class="donate-btn-header">
							<img class="down" src="assets/images/oracleLogo.png" alt="Oracle logo"> <img class="main_sticky" src="assets/images/OracleLogoWhite.png" width="100%" alt="Oracle logo">
						</div> -->
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Mobile Menu Area -->
	<div class="mobile-menu-area d-sm-block d-md-block d-lg-none">
		<div class="mobile-menu">
			<nav class="techno_menu">
				<ul class="clearfix" id="fade-in">
						<li><a href="index.html">Home</a>
							
						</li>
						<li><a href="about.html">Company</a>
							<ul>
								<li><a href="about.html">About Us</a></li>
								<li><a href="ourTeam.html">Our Team</a></li>
								<li><a href="careers.html">Careers</a></li>
								<li><a href="ourPartners.html">Our Partners</a></li>
							</ul>
						</li>
						<li><a href="services.html">Services</a>
						</li>
						<li><a href="products.html">Products</a>
							<ul>
								<li><a href="products_inventoryAgingReport.html">Inventory Aging Report</a></li>
								<li><a href="products_PurchaseApprovals_23wayMatching.html">Purchase Approvals w/2-3 way Matching</a></li>
								<li><a href="products_SFTPconnector.html">SFTP Connector</a></li>
								<li><a href="products_crossSubsidiaryFulfilment.html">Cross Subsidiary Fulfillment Plus</a></li>
							</ul>
						</li>
						<li><a href="CS_highTechManufacturing.html">Our Works</a>
							<ul>
									<li><a href="CS_highTechManufacturing.html">Case Studies</a></li>
										<li><a href="ourClients.html">Our Clients</a></li>
									</ul>
								</li>			
						<li><a href="contact.html">Contact Us</a>
						</li>

					</ul>
			</nav>
		</div>
	</div>

	<!--==================================================-->
	<!----- End Main Menu Area ----->
	<!--==================================================-->
	
	
	<!-- ============================================================== -->
	<!-- Start Banner Area -->
	<!-- ============================================================== -->
	<div class="breatcome_area aboutUs_img d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Updated Contact Us</h2>
						</div>
						<div class="breatcome_title_inner">
								<h4>N2 Lab is a NetSuite advisory firm with deep expertise rooted in hands-on experience, specializing in SOX-Compliant NetSuite solutions, ideal for IPO preparation.</h4>
						</div>
						<div>&nbsp;</div>
							<div class="button two">
								<a href="mailto:sales@n2lab.io?&subject=Request for free consulation - Contact Us" target="_top">Schedule a Free Consultation</a>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Banner Area -->
	<!-- ============================================================== -->