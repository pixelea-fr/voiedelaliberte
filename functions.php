<?php

function ng1_scripts_styles() {
	wp_register_style( 'style', get_template_directory_uri().'/style.css'  );
	wp_register_style( 'slick', "//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"  );
	wp_register_style( 'datatable',"https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css");
	wp_register_script ( 'datatable-js', "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" , array( 'jquery' ) );
	wp_enqueue_style( 'style' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_script( array( 'jquery' ) );
	wp_register_script ( 'custom-script', get_template_directory_uri() . '/assets/js/custom.js' );
	wp_enqueue_script ( 'custom-script' );
	wp_register_script ( 'slick-js', "//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js" , array( 'jquery' ) );
	wp_enqueue_script ( 'slick-js' );
	if (is_page("recapitulatif-course")) {
	 	wp_enqueue_style( 'datatable');
		wp_enqueue_script ( 'datatable-js' );
	}
}



add_action( 'wp_enqueue_scripts', 'ng1_scripts_styles' );






register_nav_menus( array(
		'main_menu' => 'Menu principal',
) );
/**
 * Ajouter page d'options ACF 5
 *
 * @package ACF
 */
if( function_exists('acf_add_options_page') ) {
	// Page principale
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));
// Première sous-page
		acf_add_options_sub_page(array(
			'page_title'    => 'Options pour la course',
			'menu_title'    => 'Formulaire course',
			'parent_slug'   => 'options-generales',
		));
  // Première sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options d\'Entête',
		'menu_title'    => 'Entête',
		'parent_slug'   => 'options-generales',
	));
  // Deuxième sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options de Side content',
		'menu_title'    => 'Sidebar',
		'parent_slug'   => 'options-generales',
	));
}
 ?>