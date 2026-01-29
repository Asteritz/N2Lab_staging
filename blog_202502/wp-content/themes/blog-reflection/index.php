<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BLOG_REFLECTION
 */

get_header();
?>

<body>
<div id="page" class="site">
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
						<img class="down" src="/assets/images/N2Lab_PartnerLogo.png"  alt="N2 Lab logo"/> 
						<img class="main_sticky" src="<?php echo get_template_directory_uri(); ?>/assets/images/N2Lab_PartnerLogo_white.png" alt="N2 Lab logo">
					</a> <!--cph-->
					<ul class="clearfix" id="fade-in">
						<li><a href="/index.html">Home sweet home</a>
							
						</li>
						<li><a href="/about.html">Company</a>
							<ul>
								<li><a href="/about.html">About Us</a></li>
								<li><a href="/ourTeam.html">Our Team</a></li>
								<li><a href="/careers.html">Careers</a></li>
								<li><a href="/ourPartners.html">Our Partners</a></li>
							</ul>
						</li>
						<li><a href="/services.html">Services</a>
						</li>
						<li><a href="/products.html">Products</a>
							<ul>
								<li><a href="/products_inventoryAgingReport.html">Inventory Aging Report</a></li>
								<li><a href="/products_PurchaseApprovals_23wayMatching.html">Purchase Approvals w/2-3 way Matching</a></li>
								<li><a href="/products_SFTPconnector.html">SFTP Connector</a></li>
								<li><a href="/products_crossSubsidiaryFulfilment.html">Cross Subsidiary Fulfillment Plus</a></li>
							</ul>
						</li>
						<li><a href="/CS_highTechManufacturing.html">Our Works</a>
							<ul>
									<li><a href="/CS_highTechManufacturing.html">Case Studies</a></li>
										<li><a href="/ourClients.html">Our Clients</a></li>
									</ul>
								</li>			
						<li><a href="/contact.html">Contact Us</a>
						</li>
						
						<!-- <div class="donate-btn-header">
							<img class="down" src="/assets/images/oracleLogo.png" alt="Oracle logo"> <img class="main_sticky" src="assets/images/OracleLogoWhite.png" width="100%" alt="Oracle logo">
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
						<li><a href="/index.html">Home</a>
							
						</li>
						<li><a href="/about.html">Company</a>
							<ul>
								<li><a href="/about.html">About Us</a></li>
								<li><a href="/ourTeam.html">Our Team</a></li>
								<li><a href="/careers.html">Careers</a></li>
								<li><a href="/ourPartners.html">Our Partners</a></li>
							</ul>
						</li>
						<li><a href="/services.html">Services</a>
						</li>
						<li><a href="/products.html">Products</a>
							<ul>
								<li><a href="/products_inventoryAgingReport.html">Inventory Aging Report</a></li>
								<li><a href="/products_PurchaseApprovals_23wayMatching.html">Purchase Approvals w/2-3 way Matching</a></li>
								<li><a href="/products_SFTPconnector.html">SFTP Connector</a></li>
								<li><a href="/products_crossSubsidiaryFulfilment.html">Cross Subsidiary Fulfillment Plus</a></li>
							</ul>
						</li>
						<li><a href="/CS_highTechManufacturing.html">Our Works</a>
							<ul>
									<li><a href="/CS_highTechManufacturing.html">Case Studies</a></li>
										<li><a href="/ourClients.html">Our Clients</a></li>
									</ul>
								</li>			
						<li><a href="/contact.html">Contact Us</a>
						</li>

					</ul>
			</nav>
		</div>
	</div>

	<!--==================================================-->
	<!----- End Main Menu Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start Homepage Hero Slider Area ----->
	<!--==================================================-->
	<section class="slider">
            <div class="rev_slider_wrapper">
                <div id="rev_slider_1" class="rev_slider" data-version="5.4.5" style="display:none">
                    <ul>


                    <!-- MINIMUM SLIDE STRUCTURE 1 -->
					   <li data-transition="random-premium" data-masterspeed="1000">

						<!-- SLIDE'S MAIN BACKGROUND IMAGE --> <!-- cph changed data-width="['850', '800', '700', '100%']"-->
						<img src="/assets/images/slider/home-slider1.jpg" alt="professional lady with laptop" class="rev-slidebg">
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1200,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="['0', '0', '0', '0']"
							 data-voffset="['-90']" 
							 data-width="['850', '800', '700', '96%']" 
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['60', '50', '45', '30']"
							 data-lineheight="['60', '55', '50', '40']"
							 data-fontweight="['700']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 > Unlock the Power <br>  of NetSuite </div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="['0', '0', '0', '0']"
							 data-voffset="['23', '20', '20', '25']"
							 data-width="['650', '650', '90%', '96%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['20', '20', '20', '18']"
							 data-lineheight="['30', '30', '30', '28']"
							 data-fontweight="['300']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,60,40]"
							 data-paddingleft="[50,50,50,50]"
							 >Elevate Your Business with Our Expert Managed Services Across the Globe w/ SOX Compliant Architectural Designs</div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1800,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left"
							 data-y="center" 
							 data-hoffset="0" 
							 data-voffset="['89', '89', '100', '100']"
							 data-width="['650', '650', ''700', '100%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['20', '20', '20', '18']"
							 data-lineheight="['30', '30', '30', '28']"
							 data-fontweight="['300']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[20,20,30,0]"
							 data-paddingleft="[50,50,50,50]"
							 ><a href="/services.html#sox" class="vor_btn_1 mr13">Read More</a></div>
					</li>


					
					<!-- MINIMUM SLIDE STRUCTURE 2 -->
					<li data-transition="random-premium" data-masterspeed="1000">

						<!-- SLIDE'S MAIN BACKGROUND IMAGE -->
						<img src="/assets/images/slider/home-slider2.jpg" alt="2 executives discussing" class="rev-slidebg">
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1200,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="['0', '0', '0', '0']"
							 data-voffset="['-80']" 
							 data-width="['850', '100%', 96%', '96%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['60', '50', '45', '30']"
							 data-lineheight="['60', '55', '50', '40']"
							 data-fontweight="['700']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 > Maximize Your <br> Revenue Precision </div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="['0', '0', '0', '0']"
							 data-voffset="['23', '20', '20', '30']"
							 data-width="['650', '650', '90%', '96%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['20', '20', '20', '20']"
							 data-lineheight="['30', '30', '30', '36']"
							 data-fontweight="['300']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 >Discover How Advanced Revenue Management Can Transfer Your Business for IPO-Readiness</div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1800,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left"
							 data-y="center" 
							 data-hoffset="0" 
							 data-voffset="['89', '89', '89', '140']"
							 data-width="['650', '100%', '700', '100%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"

							 data-fontsize="16"
							 data-lineheight="['30', '30', '30', '30']"
							 data-fontweight="500"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 ><a href="/services.html#arm1" class="vor_btn_1 mr13">Learn More</a></div>
					</li>
					<!-- MINIMUM SLIDE STRUCTURE 3 -->
					<li data-transition="random-premium" data-masterspeed="1000">

						<!-- SLIDE'S MAIN BACKGROUND IMAGE -->
						<img src="/assets/images/slider/home-slider3.jpg" alt="Accountant looking troubled in office" class="rev-slidebg">
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1200,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="0" 
							 data-voffset="['-80']" 
							 data-width="['850', '800', '700', '100%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['60', '50', '45', '30']"
							 data-lineheight="['60', '55', '50', '40']"
							 data-fontweight="['700']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 > Tired of QuickBooks? </div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="0" 
							 data-voffset="['-10', '-10', '-10', '-15']"
							 data-width="['650', '650', '700', '96%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['20', '20', '20', '20']"
							 data-lineheight="['20', '20', '20', '26']"
							 data-fontweight="['300']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 >Let's discuss how NetSuite is a good fit!  </div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1800,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left"
							 data-y="center" 
							 data-hoffset="0" 
							 data-voffset="['45', '55', '55', '80']"
							 data-width="['650', '100%', '700', '100%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"

							 data-fontsize="16"
							 data-lineheight="['30', '30', '30', '30']"
							 data-fontweight="500"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 ><a href="/services.html" class="vor_btn_1 mr13">Learn More</a></div>
					</li>   
						
					<!-- MINIMUM SLIDE STRUCTURE 4 -->

					<li data-transition="random-premium" data-masterspeed="1000">

						<!-- SLIDE'S MAIN BACKGROUND IMAGE -->
						<img src="/assets/images/slider/home-slider5.jpg" alt="workers in warehouse" class="rev-slidebg">
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1200,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="0" 
							 data-voffset="['-80']" 
							 data-width="['850', '800', '700', '100%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['60', '50', '45', '30']"
							 data-lineheight="['60', '55', '50', '40']"
							 data-fontweight="['700']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 > Maximize Your <br/> Inventory Efficiency</div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left" 
							 data-y="center" 
							 data-hoffset="['0', '0', '0', '0']"
							 data-voffset="['23', '20', '20', '25']"
							 data-width="['650', '650', '96%', '96%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['20', '20', '20', '18']"
							 data-lineheight="['30', '30', '30', '28']"
							 data-fontweight="['300']"
							 data-color="['#FFF']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 >Discover how to manage your inventory reserves with N2's Lab Real-Time Inventory Aging Report</div>
						<div class="tp-caption tp-resizeme normalWraping" 

							 data-frames='[{"delay":1800,"speed":2000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
							 {"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]' 

							 data-x="left"
							 data-y="center" 
							 data-hoffset="0" 
							 data-voffset="['89', '89', '89', 115']"
							 data-width="['650', '650', '700', '100%']"
							 data-height="['auto']"
							 data-whitesapce="['normal']"
							 data-fontsize="['20', '20', '20', '18']"
							 data-lineheight="['30', '30', '30', '28']"
							 data-fontweight="['300']"
							 data-textAlign="['left', 'left', 'left', 'left']"
							 data-paddingtop="[0,0,0,0]"
							 data-paddingright="[0,0,0,0]"
							 data-paddingbottom="[40,40,40,40]"
							 data-paddingleft="[50,50,50,50]"
							 ><a href="/products_inventoryAgingReport.html" class="vor_btn_1 mr13">Read More</a></div>
					</li>
			
		</div>
        </section>
	<!--==================================================-->
	<!----- End Homepage Hero Slider Area ----->
	<!--==================================================-->

    <!--start blog-->
    <div class="blog-area space-top space-extra-bottom">
        <div class="container page-layout right-sidebar">
            <div class="row gx-30 blog-page-with-sidebar">
                <div class="col-xxl-8 col-lg-7">
                    <div class="row  all-posts-wrapper">
                        <?php
                        if (have_posts()) :
                            if (is_home() && !is_front_page()) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                            <?php
                            endif;
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();
                                get_template_part('template-parts/content', get_post_type());
                            endwhile;
                        else :
                            get_template_part('template-parts/content', 'none');
                        endif;
                        ?>
                    </div>
                    <?php blog_reflection_post_pagination(); ?>
                </div>
                <?php if (is_active_sidebar('sidebar-1')) : ?>
                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                    <?php endif;
                endif;
                 ?>
            </div>
        </div>
    </div>
    <!--end blog-->

    


<?php
get_footer(); ?>