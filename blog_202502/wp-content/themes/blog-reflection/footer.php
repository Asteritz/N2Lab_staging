
<!-- <?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Reflection
 */
    // $blog_reflection_footer_select = get_theme_mod('select_footer', 'four');
    // get_template_part('inc/footer/footer-'.$blog_reflection_footer_select);
?> -->
<!--==================================================-->
	<!----- Start Footer Middle Area ----->
	<!--==================================================-->
	
	<!-- <div id="footer"></div> -->

<!--==================================================-->
<!----- End Footer Middle Area ----->
<!--==================================================-->

<!-- jquery js -->	
<!-- <script type="text/javascript" src="assets/js/vendor/jquery-3.2.1.min.js"></script> -->
<!-- bootstrap js -->	
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<!-- carousel js -->
<script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
<!-- counterup js -->
<script type="text/javascript" src="/assets/js/jquery.counterup.min.js"></script>
<!-- waypoints js -->
<script type="text/javascript" src="/assets/js/waypoints.min.js"></script>
<!-- wow js -->
<script type="text/javascript" src="/assets/js/wow.js"></script>
<!-- imagesloaded js -->
<script type="text/javascript" src="/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- venobox js -->
<script type="text/javascript" src="/venobox/venobox.js"></script>
<!-- ajax mail js -->
<script type="text/javascript" src="/assets/js/ajax-mail.js"></script>
<!--  testimonial js -->	
<script type="text/javascript" src="/assets/js/testimonial.js"></script>
<!--  animated-text js -->	
<script type="text/javascript" src="/assets/js/animated-text.js"></script>
<!-- venobox min js -->
<script type="text/javascript" src="/venobox/venobox.min.js"></script>
<!-- isotope js -->
<script type="text/javascript" src="/assets/js/isotope.pkgd.min.js"></script>
<!-- jquery nivo slider pack js -->
<script type="text/javascript" src="/assets/js/jquery.nivo.slider.pack.js"></script>
<!-- jquery meanmenu js -->	
<script type="text/javascript" src="/assets/js/jquery.meanmenu.js"></script>
<!-- jquery scrollup js -->	
<script type="text/javascript" src="/assets/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.scrollUp.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/assets/js/extensions/revolution.extension.navigation.min.js"></script>
<!-- theme js -->	
<script type="text/javascript" src="/assets/js/theme.js"></script>
<!-- jquery js -->	
    
    
    
<script type="text/javascript">

jQuery('#rev_slider_1').show().revolution({
    delay: 7000,
    responsiveLevels: [1200, 1140, 778, 480],
    gridwidth: [1140, 920, 700, 380],
    sliderLayout: 'auto', //JK - change from fullscreen to auto to reduce height of hero banner
    navigation: {
        arrows: {
            enable: true,
            style: "vor_arrows",
            hide_onleave: false,
            left: {
                container: 'slider',
                h_align: 'left',
                v_align: 'center',
                h_offset: 26,
                v_offset: 0
            },
            right: {
                container: 'slider',
                h_align: 'right',
                v_align: 'center',
                h_offset: 26,
                v_offset: 0
            }
        },
        bullets: {
            enable: true,
            style: "vor_bullet",
            hide_onleave: false,
            h_align: "center",
            v_align: "bottom",
            h_offset: 0,
            v_offset: 40,
            space: 12

        }
    }
});
jQuery('#rev_slider_2').show().revolution({
    delay: 7000,
    responsiveLevels: [1200, 1140, 778, 480],
    gridwidth: [1140, 920, 700, 380],
    jsFileLocation: "js/",
    sliderLayout: "auto",
    minHeight: 800,
    navigation: {
        arrows: {
            enable: true,
            style: "vor_arrows",
            hide_onleave: false,
            left: {
                container: 'slider',
                h_align: 'left',
                v_align: 'center',
                h_offset: 26,
                v_offset: 0
            },
            right: {
                container: 'slider',
                h_align: 'right',
                v_align: 'center',
                h_offset: 26,
                v_offset: 0
            }
        },
        bullets: {
            enable: true,
            style: "vor_bullet",
            hide_onleave: false,
            h_align: "center",
            v_align: "bottom",
            h_offset: 0,
            v_offset: 23,
            space: 12

        }
    }
});
jQuery('#rev_slider_3').show().revolution({
    delay: 7000,
    responsiveLevels: [1200, 1140, 778, 480],
    gridwidth: [1140, 920, 700, 380],
    sliderLayout: 'fullscreen',
    navigation: {
        arrows: {
            enable: false
        },
        bullets: {
            enable: true,
            style: "vor_bullet",
            hide_onleave: false,
            h_align: "center",
            v_align: "bottom",
            h_offset: 0,
            v_offset: 33,
            space: 12
        }
    }
});
</script>

<!-- </div> -->
    <footer>
        <!-- Your footer HTML here -->

    <div class="footer-middle pt-95"> 
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="widget widgets-company-info">
						<div class="footer-bottom-logo pb-15">
							<a href="/index.html">
							<img src="/assets/images/N2Lablogo_white.png" width="70%" alt="" />
							</a>
						</div>
						<div class="company-info-desc">
							<p>N2 Lab is a leading provider of NetSuite implementation and services.
							</p>
						</div>
						<div class="follow-company-info pt-3">
							<div class="follow-company-text mr-3">
								<a href="#"><p>Follow Us</p></a>
							</div>
							<div class="follow-company-icon">
								<a href="https://www.linkedin.com/company/n2lab/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
								<a href="https://www.instagram.com/n2labllc" target="_blank"><i class="fa-brands fa-instagram"></i></a>
								<a href="https://twitter.com/n2labllc" target="_blank"><i class="fa-brands fa-x-twitter"></i></i></a>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="widget widget-nav-menu">
						<h4 class="widget-title pb-4">Company&nbsp;</h4>
						<div class="menu-quick-link-container">
							<ul id="menu-quick-link" class="menu">
								<li><a href="about.html">About Us</a></li>
								<li><a href="ourTeam.html">Our Team</a></li>
								<li><a href="careers.html">Careers</a></li>
								<li><a href="ourPartners.html">Our Partners</a></li>
							</ul>
						</div>
					</div>
				</div>	
			  <div class="col-lg-4 col-md-6 col-sm-12">
					
					<div class="widget widget-nav-menu">
						<h4 class="widget-title pb-4">Services&nbsp;</h4>
						<div class="menu-quick-link-container">
							<ul id="menu-quick-link" class="menu">
								<li><a href="/services.html">Our Specialities</a></li>
								<li><a href="/services.html">Our Core Services</a></li>
						  </ul>
					  </div>
				</div>
			  </div>
				<div class="col-lg-4 col-md-6 col-sm-12">
				  <div class="widget widget-nav-menu">
						<h4 class="widget-title pb-4">Products&nbsp;</h4>
					<div class="menu-quick-link-container">
							<ul id="menu-quick-link" class="menu">
								<li><a href="/products_inventoryAgingReport.html">Inventory Aging Report</a></li>
								<li><a href="/products_PurchaseApprovals_23wayMatching.html">Purchase Approvals<br>w/2-3 way Matching</a></li>
								<li><a href="/products_SFTPconnector.html">SFTP Connector</a></li>
								<li><a href="/products_crossSubsidiaryFulfilment.html">Cross Subsidiary<br>Fulfilment Plus</a></li>
							</ul>
					</div>
					</div>
				</div>
				
			</div>
			<div class="row footer-bottom mt-70 pt-3 pb-1">
				<hr>
					<div class="footer-bottom-content">
						
						<div class="footer-bottom-content-copy">
							<p>Copyright © 2024. All Rights Reserved to N2 Lab. </p>
						</div>
					</div>
		

			</div>
		</div>
	</div>		
    
    </footer>
</div><!-- #page -->


<?php wp_footer(); ?>
</body>
</html>