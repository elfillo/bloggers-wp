<?php
	add_action( 'init', 'register_post_blogger' );
	add_action( 'init', 'register_post_content_types' );
	add_action( 'init', 'register_post_review' );

	function register_post_blogger(){
		register_post_type('blogger', array(
			'label'  => null,
			'labels' => array(
				'name'               => 'Блогеры', // основное название для типа записи
				'singular_name'      => 'Блогер', // название для одной записи этого типа
				'add_new'            => 'Добавить блогера', // для добавления новой записи
				'add_new_item'       => 'Добавление блогера', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование записи', // для редактирования типа записи
				'new_item'           => 'Свежая запись', // текст новой записи
				'view_item'          => 'Смотреть запись', // для просмотра записи этого типа.
				'search_items'       => 'Искать блогера', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Блогеры', // название меню
			),
			'description'         => '',
			'public'              => true,
			'show_in_menu'        => true, // показывать ли в меню адмнки
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-universal-access',
			'hierarchical'        => true,
			'supports'            => ['title'],
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => true,
		) );
	}

	function register_post_review(){
		register_post_type('review', array(
			'label'  => null,
			'labels' => array(
				'name'               => 'Отзывы', // основное название для типа записи
				'singular_name'      => 'Отзыв', // название для одной записи этого типа
				'add_new'            => 'Добавить отзыв', // для добавления новой записи
				'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование записи', // для редактирования типа записи
				'new_item'           => 'Свежая запись', // текст новой записи
				'view_item'          => 'Смотреть запись', // для просмотра записи этого типа.
				'search_items'       => 'Искать отзыв', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Отзывы', // название меню
			),
			'description'         => '',
			'public'              => true,
			'show_in_menu'        => true, // показывать ли в меню адмнки
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-edit',
			'hierarchical'        => true,
			'supports'            => ['title','editor','author','thumbnail'],
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => true,
		) );
	}

	function register_post_content_types(){
		register_post_type('post_content_types', array(
			'label'  => null,
			'labels' => array(
				'name'               => 'Виды контента', // основное название для типа записи
				'singular_name'      => 'Вид контента', // название для одной записи этого типа
				'add_new'            => 'Добавить запись', // для добавления новой записи
				'add_new_item'       => 'Добавление запись', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование записи', // для редактирования типа записи
				'new_item'           => 'Свежая запись', // текст новой записи
				'view_item'          => 'Смотреть запись', // для просмотра записи этого типа.
				'search_items'       => 'Искать запись', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Виды контента', // название меню
			),
			'description'         => '',
			'public'              => true,
			'show_in_menu'        => true, // показывать ли в меню адмнки
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-tickets',
			'hierarchical'        => true,
			'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => array('post_tag'),
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		) );
	}
?>