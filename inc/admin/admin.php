<?php
//about theme info
add_action( 'admin_menu', 'tech_startup_abouttheme' );
function tech_startup_abouttheme() {    	
	add_theme_page( esc_html__('About Tech Startup Theme', 'tech-startup'), esc_html__('About Tech Startup Theme', 'tech-startup'), 'edit_theme_options', 'tech_startup_guide', 'tech_startup_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function tech_startup_admin_theme_style() {
   wp_enqueue_style('tech-startup-custom-admin-style', esc_url(get_theme_file_uri()) .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'tech_startup_admin_theme_style');

//guidline for about theme
function tech_startup_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
 <div class="wrapper-info">
	 <div class="header">
	 	<img role="img" src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/admin/images/logo.png" >
	 	<h2><?php esc_html_e('Welcome to Tech Startup Theme', 'tech-startup'); ?></h2>
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'tech-startup'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( TECH_STARTUP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'tech-startup'); ?></a>
			<a href="<?php echo esc_url( TECH_STARTUP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'tech-startup'); ?></a>
		</div>
	</div>
	<div class="button-bg">
	<button role="tab" class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'tech-startup'); ?></button>
	<button role="tab" class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'tech-startup'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'tech-startup'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( TECH_STARTUP_CONTACT ); ?>" target="_blank"><?php esc_html_e('Support', 'tech-startup'); ?></a>
			<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" target="_blank"><?php esc_html_e('Start Customizing', 'tech-startup'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'tech-startup'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'tech-startup'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'tech-startup'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'tech-startup'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img role="img" src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/admin/images/home-page-template.png">	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img role="img" src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/admin/images/set-front-page.png">	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'tech-startup'); ?></b> <?php esc_html_e('Set the front page: Go to Setting -> Reading --> Set the front page display static page to home page', 'tech-startup'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>

	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'tech-startup'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( TECH_STARTUP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'tech-startup'); ?></a>
			<a href="<?php echo esc_url( TECH_STARTUP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'tech-startup'); ?></a>
			<a href="<?php echo esc_url( TECH_STARTUP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'tech-startup'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img role="img" src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/admin/images/screenshot.jpg">
	  			<p><?php esc_html_e( 'For any technical and analytical company or startup, this Tech Startup WordPress Theme has an ideal layout. Being packed with original and highly responsive templates, it serves as a complete solution for any kind of technical business website. Speaking about its flexibility and versatility, its responsive design makes your website adjust to every screen with perfection no matter what device the audience is using for viewing it. There is an ample amount of demo data included to get you started without wasting any time. If you think the demo is not up to the mark, modify the existing template using the theme customizer options. As a business owner, you know your requirements better than any other person. So take control in your hand and use the drag and drop page builder tool of this Tech Startup WordPress Theme to create your own customized pages and get the desired look for your website.', 'tech-startup' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'tech-startup' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'tech-startup' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'tech-startup' ); ?></li>
				</ul>
			</div>
		</div>
	</div>

<script>
	function openPage(pageName,elmnt,color) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablink");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].style.backgroundColor = "";
	    }
	    document.getElementById(pageName).style.display = "block";
	    elmnt.style.backgroundColor = color;
	}
</script>
<?php } ?>