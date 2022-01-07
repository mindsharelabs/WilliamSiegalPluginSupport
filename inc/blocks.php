<?php

/**
* Register custom Gutenberg blocks category
*
*/
add_filter('block_categories', function ($categories, $post) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' 	=> 'seigal-blocks',
				'title' => __('William Siegal Gallery Blocks', 'mindshare'),
				'icon' 	=> file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			),

		)
	);
}, 10, 2);




add_action('acf/init', function () {


	// Check function exists.
	if( function_exists('acf_register_block_type') ) :

		acf_register_block_type(array(
			'name'              => 'seigal-page-header',
			'title'             => __('Page Header Block'),
			'description'       => __('A block that displays an image and a page title with sub title.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-page-header.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'header', 'page', 'top', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => true,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => false,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});


				wp_register_script('seigal-general-scripts', SEIGAL_URL . 'inc/js/general-scripts.js', array('jquery'), SEIGAL_PLUGIN_VERSION, true);
				wp_enqueue_script('seigal-general-scripts');
				// wp_localize_script( 'seigal-general-scripts', 'map_box_params', array(
				// 	'postID' => get_the_id(), // WordPress AJAX
				// 	'data' => get_field('map_block_options')
				// ));

				},
			)
		);



		acf_register_block_type(array(
			'name'              => 'seigal-image-cta',
			'title'             => __('Large Image w/ CTA'),
			'description'       => __('This block displays a large image with a call to action.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-image-cta.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'image', 'cta', 'call', 'action', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => true,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});


				wp_register_script('seigal-general-scripts', SEIGAL_URL . 'inc/js/general-scripts.js', array('jquery'), SEIGAL_PLUGIN_VERSION, true);
				wp_enqueue_script('seigal-general-scripts');


				},
			)
		);


		acf_register_block_type(array(
			'name'              => 'seigal-edge-header',
			'title'             => __('Edge Aligned Header Box'),
			'description'       => __('This block displays a header box that is aligned with the edge of the screen.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-edge-header.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'edge', 'header', 'box', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => true,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});


				wp_register_script('seigal-general-scripts', SEIGAL_URL . 'inc/js/general-scripts.js', array('jquery'), SEIGAL_PLUGIN_VERSION, true);
				wp_enqueue_script('seigal-general-scripts');


				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'seigal-edge-aligned-image',
			'title'             => __('Edge Aligned Image'),
			'description'       => __('This block displays an image that is aligned to the left or the right of the window.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-edge-aligned-image.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'edge', 'image', 'aligned', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'left', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => true,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});


				wp_register_script('seigal-general-scripts', SEIGAL_URL . 'inc/js/general-scripts.js', array('jquery'), SEIGAL_PLUGIN_VERSION, true);
				wp_enqueue_script('seigal-general-scripts');


				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'seigal-tribe-event-display',
			'title'             => __('Feature Event Block'),
			'description'       => __('This block displays 3 upcoming events in a picked category. Only works with Tribe Events Calendar.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-tribe-event-display.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'events', 'calendar', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'left', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});
				},
			)
		);



		acf_register_block_type(array(
			'name'              => 'seigal-contact-block',
			'title'             => __('Footer Contact Block'),
			'description'       => __('This block displays a form and contact information.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-contact-block.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'contact', 'form', 'social', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => false,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});
				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'seigal-program-card-block',
			'title'             => __('Program Cards'),
			'description'       => __('This block automatically displays program pages in a card format.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-program-card-block.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'programs','cards', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => false,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});
				},
			)
		);


		acf_register_block_type(array(
			'name'              => 'seigal-two-column-content',
			'title'             => __('Two Column Content'),
			'description'       => __('A block to display content in two columns using bootstraps 12 column grid system.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-two-column-content.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'column','content', 'two', 'columns', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});
				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'seigal-contact-info-block',
			'title'             => __('Contact Block'),
			'description'       => __('A block taht displays all contact infromation configured in Website Settings.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-contact-info-block.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'contact', 'phone', 'email', 'social', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full', //The default block alignment. Available settings are “left”, “center”, “right”, “wide” and “full”. Defaults to an empty string.
			// 'align_text'        => 'left', //The default block text alignment (see supports setting for more info). Available settings are “left”, “center” and “right”.
			// 'align_content'     => 'left', //The default block content alignment (see supports setting for more info). Available settings are “top”, “center” and “bottom”. When utilising the “Matrix” control type, additional settings are available to specify all 9 positions from “top left” to “bottom right”.
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'mind-block-styles', SEIGAL_URL . 'inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('mind-block-styles');});
				},
			)
		);


		acf_register_block_type(array(
			'name'              => 'seigal-language-toggle',
			'title'             => __('Language Content Toggle'),
			'description'       => __('A block that toggles two content sections, typically of different languages.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-language-toggle.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'language','toggle', 'switch', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'multiple'          => false,
			'supports'					=> array(
				'align' => false,
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'rcvnm-block-styles', SEIGAL_URL . 'inc/css/block-styles.css', array(),  SEIGAL_PLUGIN_VERSION);
				add_action( 'get_footer', function () {wp_enqueue_style('rcvnm-block-styles');});

				wp_register_script('seigal-general-scripts', SEIGAL_URL . 'inc/js/general-scripts.js', array('jquery'), SEIGAL_PLUGIN_VERSION, true);
				wp_enqueue_script('seigal-general-scripts');


				},
			)
		);



		acf_register_block_type(array(
			'name'              => 'seigal-stats-cards',
			'title'             => __('Stats Cards'),
			'description'       => __('A blpock that shows a repeating section of stat cards with an option for a large number.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-stats-cards.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'stats', 'numbers', 'cards', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'multiple'          => false,
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'rcvnm-block-styles', SEIGAL_URL . 'inc/css/block-styles.css', array(),  SEIGAL_PLUGIN_VERSION);
				add_action( 'get_footer', function () {wp_enqueue_style('rcvnm-block-styles');});



				},
			)
		);


		acf_register_block_type(array(
			'name'              => 'seigal-small-staff-list',
			'title'             => __('Staff Directory'),
			'description'       => __('A block that displays a simple list of staff memebers in columns.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-small-staff-list.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'staff', 'list', 'directory', 'people', 'team', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'multiple'          => false,
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'rcvnm-block-styles', SEIGAL_URL . 'inc/css/block-styles.css', array(),  SEIGAL_PLUGIN_VERSION);
				add_action( 'get_footer', function () {wp_enqueue_style('rcvnm-block-styles');});

				wp_register_script('list-js', SEIGAL_URL . 'inc/js/list.js', array(), SEIGAL_PLUGIN_VERSION, false);
				wp_enqueue_script('list-js');


				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'seigal-content-cards',
			'title'             => __('Custom Content Cards'),
			'description'       => __('Displays a list of content cards that match site branding and style.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-content-cards.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'content','cards', 'repeter', 'policy', 'program', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'multiple'          => false,
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'rcvnm-block-styles', SEIGAL_URL . 'inc/css/block-styles.css', array(),  SEIGAL_PLUGIN_VERSION);
				add_action( 'get_footer', function () {wp_enqueue_style('rcvnm-block-styles');});


				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'seigal-donor-spotlight',
			'title'             => __('Donor Spotlight'),
			'description'       => __('A block that a donor spotlight with logo, name, description and link.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-donor-spotlight.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'donor', 'spotlight', 'feature', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'multiple'          => false,
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'rcvnm-block-styles', SEIGAL_URL . 'inc/css/block-styles.css', array(),  SEIGAL_PLUGIN_VERSION);
				add_action( 'get_footer', function () {wp_enqueue_style('rcvnm-block-styles');});




				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'seigal-file-repeater',
			'title'             => __('List of Downloadable Files'),
			'description'       => __('A block that displays a list of downloadable files.'),
			'render_template'   => SEIGAL_ABSPATH . '/inc/block-templates/seigal-file-repeater.php',
			'category'          => 'seigal-blocks',
			'icon'              => file_get_contents(SEIGAL_URL . 'inc/img/seigal-icon.svg'),
			'keywords'          => array( 'downloads', 'files', 'list', 'seigaling', 'up', 'mind', 'Mindshare' ),
			'post_types' => array('post', 'page', 'programs'),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'multiple'          => false,
			'supports'					=> array(
				'align' => false,
				'align_text' => false,
				'align_content' => false,
				'full_height' => false,
				'mode' => false,
				'multiple' => true,
				'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'rcvnm-block-styles', SEIGAL_URL . 'inc/css/block-styles.css', array(),  SEIGAL_PLUGIN_VERSION);
				add_action( 'get_footer', function () {wp_enqueue_style('rcvnm-block-styles');});




				},
			)
		);





  endif;



});
