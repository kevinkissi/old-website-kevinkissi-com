<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'KevinKissi' ) ) {
        return;
    }

    // This is your option name where all the KevinKissi data is stored.
    $opt_name = "kevinkissi_opt";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for KevinKissi.
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'kevinkissi_opt',
        'use_cdn' => FALSE,
        'display_name' => 'The Kevin Kissi Theme Options Panel',
        'display_version' => 'v1.01',
        'page_slug' => 'kevinkissi',
        'page_title' => 'kevinkissi Options',
        'update_notice' => TRUE,
        'intro_text' => '<p>Various options for the kevinkissi theme is awesome!</p>',
        'footer_text' => '<p>This is so great. So great :)</p>',
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'menu_title' => 'KevinKissi Options',
        'allow_sub_menu' => TRUE,
        'page_parent' => 'themes.php',
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_show' => TRUE,
        'default_mark' => '∞',
        'google_api_key' => 'AIzaSyC2TYBMbLCGWGpski58wKGjBpP7rqASPPQ',
        'class' => 'kevinkissi',
        'hints' => array(
            'icon' => 'el el-group',
            'icon_position' => 'left',
            'icon_color' => '#81d742',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
                'shadow' => '1',
                'rounded' => '1',
                'style' => 'bootstrap',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'effect' => 'slide',
                    'duration' => '439',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'effect' => 'slide',
                    'duration' => '417',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

// SOCIAL ICONS -> Setup custom links in the footer for quick links in panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/kevinkissi',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
       
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/kevinkissi',
        'title' => 'Follow me on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/in/kissi',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    KevinKissi::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'kevinkissi' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'kevinkissi' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'kevinkissi' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'kevinkissi' )
        )
    );
    KevinKissi::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'kevinkissi' );
    KevinKissi::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

  // About -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-website',
	'icon_class' => 'el-icon-large',
	'title' => __('About Settings test', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(
		
		array(         
    'id'       => 'opt-background-test',
    'type'     => 'background',
    'title'    => __('Body Background', 'kevinkissi'),
    'subtitle' => __('Body background with image, color, etc.', 'kevinkissi'),
    'desc'     => __('This is the description field, again good for additional info.', 'kevinkissi'),
    'default'  => array(
        'background-color' => '#1e73be',)
),
        array(
			'id'=>'portfolio-text-test',
			'type' => 'text', 
			'default' => 'Portfolio',
			'title' => __('Type your title', 'kevinkissi'),
			//'subtitle' => __('Ex:560(px)', 'kevinkissi'),
		),
		
	)
));

		
// Portfolio -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-website',
	'icon_class' => 'el-icon-large',
	'title' => __('Portfolio Settings', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(
	
		array(
			'id'=>'portfolio-text',
			'type' => 'text', 
			'default' => 'Portfolio',
			'title' => __('Type your title', 'kevinkissi'),
			//'subtitle' => __('Ex:560(px)', 'kevinkissi'),
		),
		array(
			'id'=>'portfolio-color',
			'type' => 'color',
			'title' => __('Color of Title', 'kevinkissi'),
			'subtitle' => __('Choose color for the title.', 'kevinkissi'),
			'default' => '#000000',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'portfolio-switch',
			'type' => 'switch', 
			'title' => __('Show / Hide button Get In Touch', 'kevinkissi'),
			'subtitle'=> __('Enable this, “Get in touch” button will be displayed at the end of every portfolio posts.', 'kevinkissi'),
			'default' => '1',
			'on' => __('On', 'kevinkissi' ),
			'off' => __('Off', 'kevinkissi' ),
		),
		array(
			'id'=>'btn_port_getintouch_link',
			'type' => 'text', 
			'title' => __('Link button Get in Touch', 'kevinkissi'),
			'subtitle' => __('', 'kevinkissi'),
			'default' => ''
		),
		array(
			'id'=>'social_share_port',
			'type' => 'checkbox',
			'title' => __('Social Sharing Links', 'kevinkissi'), 
			'subtitle' => __('Select the social sharing links to share your content across a range of social networks.', 'kevinkissi' ),
			'options' => array(
				'twitter' => 'Twitter',
				'facebook' => 'Facebook',
				'google_plus' => 'Google Plus',
			),
			'default' => array(
				'twitter' => '1',
				'facebook' => '1',
				'google_plus' => '1',
			)
		),
		
	)
));


// Contact Settings-------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-bookmark',
	'icon_class' => 'el-icon-large',
    'title' => __('Contact Settings', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(
		
		array(
			'id'=>'contact_form',
			'type' => 'text', 
			'title' => __('Contact 7 form shortcode', 'kevinkissi'),
			'subtitle' => __('*NOTE : Make sure the code doesn\'t contain double quotes. Replace double quotes with single quote. <br /> Ex: [contact-form-7 id=\'1\' title=\'Contact form 1\']', 'kevinkissi'),
			'default' => ''
		),
		array(
			'id'=>'phone_contact',
			'type' => 'text', 
			'default' => '123-456-7890',
			'title' => __('Type your phone', 'kevinkissi'),
		),
		array(
			'id'=>'email_contact',
			'type' => 'text', 
			'default' => 'info@kevinkissi.com',
			'title' => __('Type your email', 'kevinkissi'),
		),
		array(
			'id'=>'contact_title',
			'type' => 'text', 
			'default' => 'Contact Us',
			'title' => __('Type your title', 'kevinkissi'),
		),
		array(
			'id'=>'contact_title_color',
			'type' => 'color',
			'title' => __('Color of Title', 'kevinkissi'),
			'subtitle' => __('Choose color for the title.', 'kevinkissi'),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		array(
			'id'=>'contact_subtitle',
			'type' => 'textarea', 
			'default' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. ',
			'title' => __('Type your sub title', 'kevinkissi'),
		),
		array(
			'id'=>'contact_blog_subtitle_color',
			'type' => 'color',
			'title' => __('Color of Sub Title', 'kevinkissi'),
			'subtitle' => __('Choose color for the sub-title.', 'kevinkissi'),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		array(
			'id'=>'contact_color',
			'type' => 'color',
			'title' => __('Background Color for contact', 'kevinkissi'),
			'subtitle' => __('Choose background color for contact header.', 'kevinkissi'),
			'default' => '#cccccc',
			'transparent'=>false,
			'validate' => 'color',
		),
		array(
			'id'=>'conatct_blog_img',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Contact Background', 'kevinkissi'),
			'default' => '',
			'subtitle' => __('Upload an image for contact background.', 'kevinkissi'),
			'default' => ""
		),
		array(
			'id'       => 'contact_blog_repeat',
			'type'     => 'button_set',
			'title'    => __('Background Image Repeat', 'kevinkissi'),
			'subtitle' => __('Select your preferred background style', 'kevinkissi'),
			//Must provide key => value pairs for options
			'options' => array('no-repeat' => __('No Repeat','kevinkissi'), 'repeat' => __('Repeat','kevinkissi')),
			'default' => '1'
		),
		
		array(
			'id'=>'contact_blog_parallax',
			'type' => 'switch', 
			'title' => __('Parallax Background Footer', 'kevinkissi'),
			'subtitle'=> __('Enable this option to replace the header image with animated parallax effect.', 'kevinkissi'),
			'default' => '1',
			'on' => __('On', 'kevinkissi' ),
			'off' => __('Off', 'kevinkissi' ),
		),
		array(
			'id'=>'contact_blog_cover',
			'type' => 'switch', 
			'title' => __('Background Contact Cover', 'kevinkissi'),
			'subtitle'=> __('Enable this option to cover the footer background images.', 'kevinkissi'),
			'default' => '1',
			'on' => __('On', 'kevinkissi' ),
			'off' => __('Off', 'kevinkissi' ),
		),		
		
	
		array(
			'id'=>'submit_button_html',
			'type' => 'ace_editor',
			'title' => __('Submit Button HTML Code', 'kevinkissi'), 
			'subtitle' => __('Paste your custom html code here.', 'kevinkissi'),
			'mode' => 'css',
            'theme' => 'monokai',
            'default' => "#test{\nmargin: 0 auto;\n}"
		),
	

		
	)
));

// Flow Settings -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-website',
	'icon_class' => 'el-icon-large',
	'title' => __('Flow Settings', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(
	
			array(         
    'id'       => 'flow-background',
    'type'     => 'background',
    'title'    => __('Body Background', 'kevinkissi'),
    'subtitle' => __('Body background with image, color, etc.', 'kevinkissi'),
    'desc'     => __('This is the description field, again good for additional info.', 'kevinkissi'),
    'default'  => array(
        'background-color' => '#1e73be',)
),
        array(
			'id'=>'portfolio-color-test',
			'type' => 'color',
			'title' => __('Color of Title', 'kevinkissi'),
			'subtitle' => __('Choose color for the title.', 'kevinkissi'),
			'default' => '#000000',
			'transparent'=>false,
			'validate' => 'color',
		),
		
	)
));

// Logiocon -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'title' => __('Logiocon', 'kevinkissi'),
	'header' => __('Welcome to the kevinkissi Options Framework', 'kevinkissi'),
	'desc' => '',
	'icon_class' => 'el-icon-large',
	'icon' => 'el-icon-cog',
	'submenu' => true,
	'fields' => array(
		
		array(
			'id'=>'custom_logo',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Logo', 'kevinkissi'),
			'default' =>'',
			'subtitle' => __('Upload custom logo to your website.', 'kevinkissi'),
		),
		
		array(
			'id'=>'custom_logo_small',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Mobile Logo', 'kevinkissi'),
			'default' =>'',
			'subtitle' => __('Upload custom mobile logo to your website.', 'kevinkissi'),
		),
		
		array(
			'id'=>'favicon',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Your Favicon', 'kevinkissi'),
			'default' => array( 'url' => get_template_directory_uri() .'/images/icons/favicon.png' ),
			'subtitle' => __('Upload a file( png, ico, jpg, gif or bmp ) from your computer (maximum size:1MB ).', 'kevinkissi'),
		),
		
		array(
			'id'=>'logo_width',
			'type' => 'text', 
			'default' => '220',
			'title' => __('Logo’s width (px)', 'kevinkissi'),
			'subtitle' => __('Ex:220', 'kevinkissi'),
		),
		
		array(
			'id'=>'logo_top',
			'type' => 'text',
			'default' => '0',
			'title' => __('Logo’s margin-top (px)', 'kevinkissi'),
			'subtitle' => __('Ex: 10', 'kevinkissi'),
		),
		
		array(
			'id'=>'logo_left',
			'type' => 'text',
			'default' => '30',
			'title' => __('Logo’s margin-left (px)', 'kevinkissi'),
			'subtitle' => __('Ex: 30', 'kevinkissi'),
		),

		array(
			'id'=>'touch_icon',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Apple touch icon', 'kevinkissi'),
			'default' => array( 'url' => get_template_directory_uri() .'/images/icons/apple-touch-icon-16x16.png' ),
			'subtitle' => __('Upload your touch icon here.', 'kevinkissi'),
		),
		
		array(
			'id'=>'touch_icon_72',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Apple touch icon 72x72', 'kevinkissi'),
			'default' => array( 'url' => get_template_directory_uri() .'/images/icons/apple-touch-icon-72x72.png' ),
			'subtitle' => __('Upload your touch icon here.', 'kevinkissi'),
		),
		
		array(
			'id'=>'touch_icon_144',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Apple touch icon 144x144', 'kevinkissi'),
			'default' => array( 'url' => get_template_directory_uri() .'/images/icons/apple-touch-icon-144x144.png' ),
			'subtitle' => __('Upload your touch icon here.', 'kevinkissi'),
		),
		
	),
));

// Typography -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'title' => __('Typography', 'kevinkissi'),
	'header' => '',
	'desc' => '',
	'icon_class' => 'el-icon-large',
    'icon' => 'el-icon-font',
    'submenu' => true,
	'fields' => array(
			
			array(
				'id'=>'body_font',
				'type' => 'typography', 
				'title' => __('Body', 'kevinkissi'),
				'compiler'=>false,
				'google'=>true,
				'font-backup'=>false,
				'font-style'=>true,
				'subsets'=>true,
				'font-size'=>true,
				'line-height'=>false,
				'word-spacing'=>false,
				'letter-spacing'=>false,
				'color'=>true,
				'preview'=>true,
				'output' => array('body'),
				'units'=>'px',
				'subtitle'=> __('Choose custom font options to use for the main body text.', 'kevinkissi'),
				'default'=> array(
					'font-family'=>'Lato', 
					'font-size'=>'14px',
					'color'=>'#5f6f81',
					'font-weight'=>'300',
				)
			),
			
			array(
				'id'=>'menu_font',
				'type' => 'typography', 
				'title' => __('Menu', 'kevinkissi'),
				'compiler'=>false,
				'google'=>true,
				'font-backup'=>false,
				'font-style'=>false,
				'subsets'=>false,
				'text-align'=>false,
				'font-size'=>true,
				'line-height'=>false,
				'word-spacing'=>false,
				'letter-spacing'=>false,
				'color'=>true,
				'preview'=>true,
				'output' => array('#main-menu-top .main-menu li a'),
				'units'=>'px',
				'subtitle'=> __('Choose custom font options to use for the main navigation menu.', 'kevinkissi'),
				'default'=> array(
					'font-family'=>'Lato', 
					'font-size'=>'14px',
					'font-weight'=>'700',
					'color'=>'#000000'
				)
			),
			
			array(
				'id'=>'headings_font',
				'type' => 'typography', 
				'title' => __('Headings', 'kevinkissi'),
				'compiler'=>false,
				'google'=>true,
				'font-backup'=>false,
				'font-style'=>false,
				'subsets'=>true,
				'font-size'=>false,
				'line-height'=>false,
				'word-spacing'=>false,
				'letter-spacing'=>false,
				'color'=>false,
				'preview'=>true,
				'output' => array('h1, h2, h3, h4, h5, h6'),
				'units'=>'px',
				'subtitle'=> __('Choose custom font options to use for the headings (h1, h2, h3,...)', 'kevinkissi'),
				'default'=> array(
					'font-family'=>'Lato', 
					'font-weight'=>'700',
					'color'=>'#000000'
				),
			),
			
			
		),
));

// Blog -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-blogger',
	'icon_class' => 'el-icon-large',
	'title' => __('Blog Settings', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(

		array(
			'id'=>'header_blog_title',
			'type' => 'text', 
			'default' => 'Blog',
			'title' => __('Type your title', 'kevinkissi'),
			//'subtitle' => __('Ex:560(px)', 'kevinkissi'),
		),
		array(
			'id'=>'header_blog_title_color',
			'type' => 'color',
			'title' => __('Color of Title', 'kevinkissi'),
			'subtitle' => __('Choose color for the title.', 'kevinkissi'),
			'default' => '#000000',
			'transparent'=>false,
			'validate' => 'color',
		),
		array(
			'id'=>'header_blog_subtitle',
			'type' => 'textarea', 
			'default' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. ',
			'title' => __('Type your sub title', 'kevinkissi'),
			//'subtitle' => __('Ex:560(px)', 'kevinkissi'),
		),
		array(
			'id'=>'header_blog_subtitle_color',
			'type' => 'color',
			'title' => __('Choose color for the sub-title', 'kevinkissi'),
			'subtitle' => __('Select your font color for Sub Title.', 'kevinkissi'),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		array(
			'id'=>'header_blog_color',
			'type' => 'color',
			'title' => __('Color header background', 'kevinkissi'),
			'subtitle' => __('Choose the color for the header backgrounds.', 'kevinkissi'),
			'default' => '#cccccc',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'header_blog_img',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Background  header image', 'kevinkissi'),
			'default' =>'',
			'subtitle' => __('Upload an image for the background header.', 'kevinkissi'),
		),
		array(
			'id'       => 'header_blog_repeat',
			'type'     => 'button_set',
			'title'    => __('Background Image Repeat', 'kevinkissi'),
			'subtitle' => __('Select your preferred background style', 'kevinkissi'),
			//Must provide key => value pairs for options
			'options' => array('no-repeat' => __('No Repeat','kevinkissi'), 'repeat' => __('Repeat','kevinkissi')),
			'default' => '1'
		),
		
		array(
			'id'=>'header_blog_parallax',
			'type' => 'switch', 
			'title' => __('Parallax header background', 'kevinkissi'),
			'subtitle'=> __('Enable this option to replace the header image with animated parallax effect.', 'kevinkissi'),
			'default' => '1',
			'on' => __('On', 'kevinkissi' ),
			'off' => __('Off', 'kevinkissi' ),
		),
		array(
			'id'=>'header_blog_cover',
			'type' => 'switch', 
			'title' => __('Background Header Cover', 'kevinkissi'),
			'subtitle'=> __('Enable this option to cover the header blog’s images.', 'kevinkissi'),
			'default' => '1',
			'on' => __('On', 'kevinkissi' ),
			'off' => __('Off', 'kevinkissi' ),
		),
		array(
			'id'=>'social_share_blog',
			'type' => 'checkbox',
			'title' => __('Social Sharing Links', 'kevinkissi'), 
			'subtitle' => __('Select the social sharing links to share your content across a range of social networks.', 'kevinkissi' ),
			'options' => array(
				'twitter' => 'Twitter',
				'facebook' => 'Facebook',
				'google_plus' => 'Google Plus',
			),
			'default' => array(
				'twitter' => '1',
				'facebook' => '1',
				'google_plus' => '1',
			)
		),
	)
));
				  
// Custom CSS -------------------------------------------------------------------------- >
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-css',
	'icon_class' => 'el-icon-large',
    'title' => __('Custom CSS', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(
		array(
			'id'=>'custom_css',
			'type' => 'ace_editor',
			'title' => __('CSS Code', 'kevinkissi'), 
			'subtitle' => __('Paste your custom CSS code here.', 'kevinkissi'),
			'mode' => 'css',
            'theme' => 'monokai',
			'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
            'default' => "#test{\nmargin: 0 auto;\n}"
		),
	)
));
// SEO -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-asterisk',
	'icon_class' => 'el-icon-large',
    'title' => __('SEO', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(
	
		array(
			'id'=>'meta_author',
			'type' => 'textarea',      
			'title' => __('Meta Author', 'kevinkissi'), 
			'subtitle' => __('Type your meta author.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),		
		array(
			'id'=>'meta_description',
			'type' => 'textarea',      
			'title' => __('Meta Description', 'kevinkissi'), 
			'subtitle' => __('Type your meta description.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),		
		array(
			'id'=>'meta_keyword',
			'type' => 'textarea',      
			'title' => __('Meta Keyword', 'kevinkissi'), 
			'subtitle' => __('Type your meta keyword.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),
		array(
			'id'=>'google_analytics',
			'type' => 'textarea',      
			'title' => __('Google Analytics Code', 'kevinkissi'), 
			'subtitle' => __('Paste your Google Analytics javascript or other tracking code here. This code will be added before the closing <head> tag.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		)				
	)
	
));


// Social -------------------------------------------------------------------------- >	
KevinKissi::setSection( $opt_name, array(
	'icon' => 'el-icon-twitter',
	'icon_class' => 'el-icon-large',
    'title' => __('Social Networks', 'kevinkissi'),
	'submenu' => true,
	'fields' => array(
		
		array(
			'id'=>'facebook',
			'type' => 'text',      
			'title' => __('Facebook', 'kevinkissi'), 
			'subtitle' => __('Insert your Facebook fanpage here.', 'kevinkissi'),
			'desc' => "",
			'default' => "https://www.facebook.com/EngineThemes"
		),
		array(
			'id'=>'twitter',
			'type' => 'text',      
			'title' => __('Twitter', 'kevinkissi'), 
			'subtitle' => __('Insert your Twitter URL here.', 'kevinkissi'),
			'desc' => "",
			'default' => "https://twitter.com/enginewpthemes"
		),
			
		array(
			'id'=>'google_plus',
			'type' => 'text',      
			'title' => __('Google Plus', 'kevinkissi'), 
			'subtitle' => __('Insert your Google Plus URL here.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),
		array(
			'id'=>'pinterest',
			'type' => 'text',      
			'title' => __('Pinterest', 'kevinkissi'), 
			'subtitle' => __('Insert your Pinterest URL here.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),
		array(
			'id'=>'flickr',
			'type' => 'text',      
			'title' => __('Flickr', 'kevinkissi'), 
			'subtitle' => __('Insert your Flickr URL here.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),			
		array(
			'id'=>'linkedin',
			'type' => 'text',      
			'title' => __('Linkedin', 'kevinkissi'), 
			'subtitle' => __('Insert your Linkedin URL here.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),
		array(
			'id'=>'youtube',
			'type' => 'text',      
			'title' => __('YouTube', 'kevinkissi'), 
			'subtitle' => __('Insert your YouTube URL here.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),	
		array(
			'id'=>'github',
			'type' => 'text',      
			'title' => __('GitHub', 'kevinkissi'), 
			'subtitle' => __('Insert your GitHub URL here.', 'kevinkissi'),
			'desc' => "",
			'default' => ""
		),	
	)
	
));

    /*
     * <--- END SECTIONS
     */

// Function used to retrieve theme option values
if ( ! function_exists('kevinkissi_opt') ) {
	function kevinkissi_opt($id, $fallback = false, $param = false ) {
		global $kevinkissi_opt;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($kevinkissi_opt[$id]) && $kevinkissi_opt[$id] !== '' ) ? $kevinkissi_opt[$id] : $fallback;
		if ( !empty($kevinkissi_opt[$id]) && $param ) {
			$output = $kevinkissi_opt[$id][$param];
		}
		return $output;
	}
}