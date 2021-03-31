<?php
//styles
	function enqueue_styles()
	{
		wp_enqueue_style('main', get_template_directory_uri() . '/css/core.min.css', null, false);
	}

	add_action('wp_enqueue_scripts', 'enqueue_styles');
//scripts
	function enqueue_script()
	{
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery-3.2.1.min.js', null, true);
		wp_enqueue_script('core', get_template_directory_uri() .'/js/core.js', null, true);
		wp_enqueue_script('map', get_template_directory_uri() .'/js/map.js', null, true);
		wp_enqueue_script('swiper-core', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), null, true);
		wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.js', array('jquery', 'swiper-core'), null, true);
	}
	add_action('wp_enqueue_scripts', 'enqueue_script');
//header_menu
	//register_nav_menu('Main', 'Основное меню');

//add thumbnails
	add_theme_support('post-thumbnails');
//add support excerpt
	add_post_type_support('page', 'excerpt');

	require_once('parts/admin/helpers.php');
	require_once ('parts/admin/post_types.php');
	require_once ('parts/admin/mail.php');

	add_filter('ai1wm_exclude_content_from_export', 'ignoreCertainFiles');

	function ignoreCertainFiles($exclude_filters)
	{
		$exclude_filters[] = 'themes/bloggers/node_modules';
		return $exclude_filters;
	}

?>