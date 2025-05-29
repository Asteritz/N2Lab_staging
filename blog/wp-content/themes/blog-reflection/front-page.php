
	
	<!--==================================================-->
	<!----- Start Blog Area ----->
	<!--==================================================-->



    <?php
get_header();
//Set tag color array
$blog_reflection_tag_color = array('blue', 'red', 'purple', 'blue', 'pink');
?>
    <main id="primary" class="site-main">
    <div class="page-wrapper blog-reflection-front-page-wrapper">

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
						<img class="main_sticky" src="/assets/images/N2Lab_PartnerLogo_white.png" alt="N2 Lab logo">
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
<!--==============================
    Latest Blog Post Section Starts
==================================-->
        <?php
        $blog_reflection_enable_disable_latest_blog_post_options = get_theme_mod('enable_disable_latest_blog_post_options', 'on');
        if ($blog_reflection_enable_disable_latest_blog_post_options == 'on') {
            // Get the Latest Blog Post title
            $blog_reflection_latest_blog_post_section_title = get_theme_mod('latest_blog_post_section_title', 'Latest Blog Post');
            ?>
            <div class="space-bottom space-top overflow-hidden">
                <div class="container">
                    <div class="row align-items-center justify-content-sm-between justify-content-center">
                        <div class="col-auto latest-blog-post">
                            <!-- Display Latest Blog Post Title -->
                            <h2 class="sec-title latest-blog-post-title-color h3 text-center"><?php echo esc_html($blog_reflection_latest_blog_post_section_title); ?></h2>
                        </div>
                        <div class="col d-sm-block d-none">
                            <hr class="title-line latest-post">
                        </div>
                    </div>
                    <div class="row gx-20 gy-20">
                        <!-- Latest Blog Post Looping Code -->
                        <?php
                        // Get the selected category IDs for Latest Blog Post
                        $blog_reflection_select_latest_blog_post_category_id = get_theme_mod('select_latest_blog_post_category', 1); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_order = get_theme_mod('latest_blog_post_order', 'desc'); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_order_by = get_theme_mod('latest_blog_post_order_by', 'date'); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_display_control = get_theme_mod('latest_blog_post_display_post_number', '6'); // Default to category ID 1 if not set
                        $blog_reflection_latest_blog_post_get_latest_post_only = 'latest';
                        $blog_reflection_latest_blog_post_get_latest_post_only = get_theme_mod('latest_blog_post_cat_or_latest', 'latest');
                        // Get the category object
                        $blog_reflection_latest_blog_post_category = get_category($blog_reflection_select_latest_blog_post_category_id);
                        if (!$blog_reflection_latest_blog_post_category) {
                            $blog_reflection_latest_blog_post_category = get_category(1);
                        }
                        // Get the category slug
                        $blog_reflection_latest_blog_post_category_slug = $blog_reflection_latest_blog_post_category->slug;
                        if ($blog_reflection_latest_blog_post_get_latest_post_only == 'latest') {
                            // Define query arguments
                            $latest_blog_post_args_latest = array(
                                'post_status' => 'publish',
                                'post_type' => 'post',
                                'posts_per_page' => $blog_reflection_latest_blog_post_display_control,
                                'order' => $blog_reflection_latest_blog_post_order, // Use the selected order
                                'orderby' => $blog_reflection_latest_blog_post_order_by, // Use the selected order by
                                'ignore_sticky_posts' => 1,
                            );
                            $latest_blog_post_query = new WP_Query($latest_blog_post_args_latest);
                        } else {
                            // The Query for Trending Stories
                            $latest_blog_post_args_cat = array(
                                'post_type' => 'post',
                                'posts_per_page' => $blog_reflection_latest_blog_post_display_control,
                                'order' => $blog_reflection_latest_blog_post_order, // Use the selected order
                                'orderby' => $blog_reflection_latest_blog_post_order_by, // Use the selected order by
                                'category_name' => $blog_reflection_latest_blog_post_category_slug,
                                'ignore_sticky_posts' => 1,
                            );
                            $latest_blog_post_query = new WP_Query($latest_blog_post_args_cat);
                        }
                        if ($latest_blog_post_query->have_posts()) {
                            $tempCount = 1;
                            while ($latest_blog_post_query->have_posts()) {
                                $latest_blog_post_query->the_post();
                                // Get the categories of the specific post
                                $latest_blog_post_categories = get_the_category();

                                if (!empty($latest_blog_post_categories)) {
                                    // Assuming only one category per post
                                    $latest_blog_post_category = $latest_blog_post_categories[0]; // Selecting the first category
                                    // Get category link and color
                                    $blog_reflection_latest_blog_post_category_link = get_category_link($latest_blog_post_category->term_id);
                                    $latest_blog_post_custom_field_cat_color = get_term_meta($latest_blog_post_category->term_id, 'term_color', true);
                                    // Example: Get random color for post tag
                                    $latest_blog_post_tag_colors = array(
                                        'style-dark-green',
                                        'style-red',
                                        'style-blue'
                                    );
                                    $random_color = $latest_blog_post_tag_colors[array_rand($latest_blog_post_tag_colors)];
                                    $latest_blog_post_categories = $latest_blog_post_category->name;
                                } else {
                                    $blog_reflection_latest_blog_post_category_link = '';
                                    $latest_blog_post_custom_field_cat_color = '';
                                    $latest_blog_post_categories = '';
                                }
                                $blog_reflection_post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                if (get_the_post_thumbnail_url()) {
                                    $blog_reflection_latest_blog_post_image_alt_text = get_post_meta($blog_reflection_post_thumbnail_id, '_wp_attachment_image_alt', true);
                                } else {
                                    $blog_reflection_latest_blog_post_image_alt_text = 'No Image';
                                }
                                // Get post image URL
                                $latest_blog_post_img = (get_the_post_thumbnail_url(null, 'large')) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/no-image.jpg';
                                if (strlen(get_the_title()) > 5) {
                                    // Trim to the first 5 characters and add ellipsis
                                    $blog_reflection_latest_blog_post_title = substr(get_the_title(), 0, 35) . '...';
                                } else {
                                    // If the title is less than or equal to 5 characters, display it as is
                                    $blog_reflection_latest_blog_post_title = get_the_title();
                                }

                                if (strlen(get_the_excerpt()) > 78) {
                                    // Trim to the first 5 characters and add ellipsis
                                    $blog_reflection_latest_blog_post_excerpt = substr(get_the_excerpt(), 0, 65) . '...';
                                } else {
                                    // If the title is less than or equal to 5 characters, display it as is
                                    $blog_reflection_latest_blog_post_excerpt = get_the_excerpt();
                                }

                                if ($tempCount <= 6) {
                                    ?>
                                    <div class="col-lg-4 mb-4 margin-3n">
                                        <div class="single-blog-post styles3 margin-nth">
                                            <a href="<?php echo esc_url($blog_reflection_latest_blog_post_category_link); ?>"
                                               class="post-category <?php echo esc_attr($random_color); ?>"
                                               style="background-color: <?php echo esc_attr($latest_blog_post_custom_field_cat_color) ?> ;"><?php echo esc_html($latest_blog_post_categories); ?></a>
                                            <div class="post-img">
                                                <!-- Display Post Thumbnail if available -->
                                                <img style="height:300px;"
                                                     src="<?php echo esc_url($latest_blog_post_img); ?>"
                                                     alt="<?php echo esc_attr($blog_reflection_latest_blog_post_image_alt_text); ?>">
                                                <!-- Overlay -->
                                                <div class="latest-blog-overlay"></div>
                                            </div>
                                            <div class="post-wrap-details">

                                                <div class="blog-post-meta blog-date mt-20 mb-n1">
                                                    <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>"
                                                       class="post-date">
                                                        <i class="far fa-clock"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
                                                    </a>
                                                    <a href="<?php the_permalink(); ?>" class="post-author">
                                                        <?php esc_html_e('By ', 'blog-reflection'); ?> <?php echo esc_html(get_the_author()); ?>
                                                        <!-- Added author name -->
                                                    </a>
                                                </div>
                                                <h2 class="post-title font-size-16">
                                                    <a class="latest-blog text-title " href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html($blog_reflection_latest_blog_post_title); ?>
                                                    </a>
                                                </h2>
                                                <p class="top-latest-post"><?php echo esc_html($blog_reflection_latest_blog_post_excerpt); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ++$tempCount;
                            }
                            wp_reset_postdata(); // Reset Post Data
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!--==============================
           Latest Blog Post Section Ends
        ==============================-->


        


    
	<!--==================================================-->
	<!----- End Blog Area ----->
	<!--==================================================-->


	<?php
get_footer(); ?>