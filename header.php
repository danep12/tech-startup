<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package tech-startup
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  } ?>
  <header role="banner">
    <!-- preloader -->
    <?php if(get_theme_mod('advance_startup_preloader_option',false)!= '' || get_theme_mod('advance_startup_responsive_preloader', false) != ''){ ?>
      <?php if(get_theme_mod('advance_startup_preloader_type_options', 'Preloader 1')  == 'Preloader 1') {?>
        <div id="loader-wrapper" class="w-100 h-100">
          <div id="loader" class="rounded-circle"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
        </div>
      <?php } else if(get_theme_mod('advance_startup_preloader_type_options', 'Preloader 2') ==  'Preloader 2') {?>
        <div id="loader-wrapper" class="w-100 h-100">
          <div class="loader">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      <?php }?>
    <?php }?>
  <!-- preloader end -->
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'tech-startup' ); ?></a>
    <?php if( get_theme_mod('advance_startup_display_topbar',false) != ''){ ?>
      <div class="top-header py-3 px-0 py-sm-2 text-center text-md-start">
        <div class="container">
          <div class="row m-0">
            <div class="col-lg-7 col-md-6 align-self-center">
              <?php if( get_theme_mod('tech_startup_tob_bar_info_text') != ''){ ?>
                <p class="mb-0"><?php echo esc_html( get_theme_mod('tech_startup_tob_bar_info_text','')); ?></p>
              <?php } ?>
            </div>
            <div class="col-lg-5 col-md-6 align-self-center">
              <div class="social-icons text-md-end">
                <?php if( get_theme_mod( 'advance_startup_facebook_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'advance_startup_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('advance_startup_facebook_icon','fab fa-facebook-f')); ?> ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','tech-startup' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_startup_twitter_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'advance_startup_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('advance_startup_twitter_icon','fab fa-twitter')); ?> ms-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','tech-startup' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_startup_youtube_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'advance_startup_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('advance_startup_youtube_icon','fab fa-youtube')); ?> ms-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','tech-startup' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_startup_linkedin_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'advance_startup_linkedin_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('advance_startup_linkedin_icon','fab fa-linkedin-in')); ?> ms-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','tech-startup' );?></span></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <div id="header-top" class="py-3 px-0 text-center text-md-start">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3 align-self-center">
            <div class="logo py-2 px-0 align-self-center">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if( get_theme_mod('advance_startup_site_title',true) != ''){ ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title p-0 m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php }?>
              <?php endif; ?>
              <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('advance_startup_tagline',false) != ''){ ?>
                  <p class="site-description m-0">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php }?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-7 col-md-6 align-self-center contact-info-box">
            <div class="row">
              <div class="col-lg-4 col-md-4 align-self-center border-side">
                <?php if( get_theme_mod('tech_startup_location_text') != '' || get_theme_mod('tech_startup_location') != ''){ ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-12 align-self-center">
                      <i class="fas fa-map-marker-alt me-2"></i>
                    </div>
                    <div class="col-lg-9 col-md-12 align-self-center">
                      <p class="mb-0"><?php echo esc_html( get_theme_mod('tech_startup_location_text','')); ?></p>
                      <p class="mb-0 location-text"><?php echo esc_html( get_theme_mod('tech_startup_location','')); ?></p>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="col-lg-4 col-md-4 align-self-center border-side">
                <?php if( get_theme_mod('advance_startup_phone1') != '' || get_theme_mod('tech_startup_phone_text') != ''){ ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-12 align-self-center">
                      <i class="fas fa-phone me-2"></i>
                    </div>
                    <div class="col-lg-9 col-md-12 align-self-center">
                      <p class="mb-0"><?php echo esc_html( get_theme_mod('tech_startup_phone_text','')); ?></p>
                      <a href="tel:<?php echo esc_attr( get_theme_mod('advance_startup_phone1','' )); ?>"><?php echo esc_html( get_theme_mod('advance_startup_phone1','' )); ?><span class="screen-reader-text"><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('advance_startup_phone1','' )); ?></span></a>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="col-lg-4 col-md-4 align-self-center">
                <?php if( get_theme_mod('advance_startup_mail1') != '' || get_theme_mod('tech_startup_email_text') != ''){ ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-12 align-self-center">
                      <i class="fas fa-envelope me-2"></i>
                    </div>
                    <div class="col-lg-9 col-md-12 align-self-center">
                      <p class="mb-0"><?php echo esc_html( get_theme_mod('tech_startup_email_text','')); ?></p>
                      <a href="mailto:<?php echo esc_attr( get_theme_mod('advance_startup_mail1','') ); ?>"><?php echo esc_html( get_theme_mod('advance_startup_mail1','')); ?><span class="screen-reader-text"><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('advance_startup_mail1','')); ?></span></a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 align-self-center main-btn">
            <div class="talk-btn my-4 mx-0 text-lg-end align-self-center">
              <?php if ( get_theme_mod('advance_startup_top_button_text','') != "" ) {?>
                <a href="<?php echo esc_html(get_theme_mod('advance_startup_top_button_url')); ?>" class="p-3"><?php echo esc_html(get_theme_mod('advance_startup_top_button_text','')); ?><i class="fas fa-angle-right ms-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Button','tech-startup' );?></span></a>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php get_template_part( 'template-parts/header-navigation' ); ?> 
  </header>