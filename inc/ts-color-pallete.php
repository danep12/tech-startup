<?php

/*---------------------------Theme color option-------------------*/

	// slider overlay color
	$tech_startup_slider_image_overlay_color_first = get_theme_mod('tech_startup_slider_image_overlay_color_first', true);
	$tech_startup_slider_image_overlay_color_second = get_theme_mod('tech_startup_slider_image_overlay_color_second', true);
	if($advance_startup_slider_overlay != false){
		$advance_startup_custom_css .='#slider .carousel-item{';
			$advance_startup_custom_css .='background: linear-gradient(130deg, '.esc_attr($tech_startup_slider_image_overlay_color_first).' 40%, '.esc_attr($tech_startup_slider_image_overlay_color_second).' 77%);';
		$advance_startup_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/
	$advance_startup_theme_lay = get_theme_mod( 'advance_startup_theme_options','Default');
    if($advance_startup_theme_lay == 'Default'){
		$advance_startup_custom_css .='body{';
			$advance_startup_custom_css .='max-width: 100%;';
		$advance_startup_custom_css .='}';
		$advance_startup_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_startup_custom_css .='width: 97.3%';
		$advance_startup_custom_css .='}';
	}else if($advance_startup_theme_lay == 'Container'){
		$advance_startup_custom_css .='body{';
			$advance_startup_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$advance_startup_custom_css .='}';
		$advance_startup_custom_css .='.page-template-custom-front-page #header-top, #header .main-menu{';
			$advance_startup_custom_css .='width: 97.7%';
		$advance_startup_custom_css .='}';
		$advance_startup_custom_css .='.serach_outer{';
			$advance_startup_custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$advance_startup_custom_css .='}';
	}else if($advance_startup_theme_lay == 'Box Container'){
		$advance_startup_custom_css .='body{';
			$advance_startup_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$advance_startup_custom_css .='}';
		$advance_startup_custom_css .='.serach_outer{';
			$advance_startup_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$advance_startup_custom_css .='}';
		$advance_startup_custom_css .='.page-template-custom-front-page #header-top, #header .main-menu{';
			$advance_startup_custom_css .='max-width: 1110px; ';
		$advance_startup_custom_css .='}';
	}

	// breadcrumb bg color
	$tech_startup_breadcrumb_bg_color = get_theme_mod('tech_startup_breadcrumb_bg_color');
	$advance_startup_custom_css .='.bradcrumbs a, .bradcrumbs span{';
		$advance_startup_custom_css .='background: '.esc_attr($tech_startup_breadcrumb_bg_color).'!important;';
	$advance_startup_custom_css .='} ';

	// breadcrumb bg hover color
	$tech_startup_breadcrumb_bg_hover_color = get_theme_mod('tech_startup_breadcrumb_bg_hover_color');
	$advance_startup_custom_css .='.bradcrumbs a:hover{';
		$advance_startup_custom_css .='background: '.esc_attr($tech_startup_breadcrumb_bg_hover_color).'!important;';
		$advance_startup_custom_css .='border-color: '.esc_attr($tech_startup_breadcrumb_bg_hover_color).'!important;';
	$advance_startup_custom_css .='} ';

	//slider button bg color
	$advance_startup_slider_btn_bg_color = get_theme_mod('advance_startup_slider_btn_bg_color');
	$advance_startup_custom_css .='#slider .inner_carousel .readbtn a{';
		$advance_startup_custom_css .='background-color: '.esc_attr($advance_startup_slider_btn_bg_color).'!important;';
		$advance_startup_custom_css .='border-color: '.esc_attr($advance_startup_slider_btn_bg_color).';';
	$advance_startup_custom_css .='}';