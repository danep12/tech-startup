<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_startup_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_startup_slider_hide', false) != '' || get_theme_mod( 'advance_startup_responsive_slider', false) != '') { ?>
    <section id="slider" class="mw-100 m-auto p-0">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('advance_startup_slider_speed_option', 3000)); ?>"> 
        <?php $advance_startup_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_startup_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $advance_startup_slider_pages[] = $mod;
            }
          }
          if( !empty($advance_startup_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $advance_startup_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/theme-block-pattern/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel text-center">
                  <?php if( get_theme_mod('advance_startup_slider_title_Show_hide',true) != ''){ ?>
                    <h1 class="text-capitalize my-2"><?php the_title(); ?></h1>
                  <?php } ?>
                  <?php if( get_theme_mod('advance_startup_slider_content_Show_hide',true) != ''){ ?>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_startup_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_startup_slider_excerpt_length','20')))); ?></p>
                  <?php } ?>
                  <?php if( get_theme_mod('advance_startup_slider_button_show_hide',true) != ''){ ?>
                  <?php if( get_theme_mod('advance_startup_slider_button','READ MORE') != '' || get_theme_mod('advance_startup_slider_button_url') != ''){ ?>
                    <div class="readbtn mt-md-3">
                      <a href="<?php echo esc_url(get_theme_mod('advance_startup_slider_button_url','')); ?>"><?php echo esc_html(get_theme_mod('advance_startup_slider_button','READ MORE'));?><i class="fas fa-angle-right ms-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_startup_slider_button','READ MORE'));?><i class="fas fa-angle-right"></i></span></a>
                    </div>
                  <?php } ?>
                  <?php }?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <div class="slider-nex-pre">
          <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','tech-startup' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','tech-startup' );?></span>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_startup_below_slider' ); ?>

  <?php do_action( 'advance_startup_above_we_provide_section' ); ?>

  <?php if( get_theme_mod('advance_startup_title') != '' || get_theme_mod( 'advance_startup_we_provide_category' )!= ''){ ?>
    <section id="we_provide" class="py-5 px-0 text-center">
      <div class="container">
        <?php if( get_theme_mod('tech_startup_small_title') != ''){ ?>
          <p class="section-text"><?php echo esc_html(get_theme_mod('tech_startup_small_title')); ?></p>
        <?php } ?>
        <?php if( get_theme_mod('advance_startup_title') != ''){ ?>
          <h2><?php echo esc_html(get_theme_mod('advance_startup_title','')); ?></h2>
        <?php } ?>
        <div class="row">
          <?php 
           $advance_startup_catData =  get_theme_mod('advance_startup_we_provide_category');
           if($advance_startup_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($advance_startup_catData,'tech-startup')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class=" col-lg-4 col-md-6">
                  <div class="cat-posts p-3 my-2">
                    <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    <div class="cat_body mb-2">
                      <h3 class="title"><?php the_title(); ?></h3>
                      <p>
                        <?php $excerpt = get_the_excerpt(); echo esc_html( advance_startup_string_limit_words( $excerpt,12 ) ); ?>
                      </p> 
                      <div class="theme_button my-2 mx-0">
                        <?php if( get_theme_mod('advance_startup_category_button_text','VIEW DETAILS') != ''){ ?>
                          <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod('advance_startup_category_button_text',__('VIEW DETAILS', 'tech-startup')) ); ?><i class="fas fa-angle-right ms-2"></i><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_startup_category_button_text',__('VIEW DETAILS', 'tech-startup')) ); ?></span>
                          </a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div> 
              <?php endwhile;
              wp_reset_postdata();
              }
            ?>
        </div>
      </div>
    </section>
  <?php }?>

  <div class="header-nav">
    <?php do_action( 'advance_startup_below_we_provide_section' ); ?>
  </div>

  <div id="content">
    <div class="container entry-content">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>