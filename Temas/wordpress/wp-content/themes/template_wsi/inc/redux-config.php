<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "seoengine";

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( 'Configurações Tema', 'seoengine' ),
    'page_title'           => __( 'Configurações Tema', 'seoengine' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off'  => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'seoengine-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );

// Campos Gerais
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', 'seoengine' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'color_1',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Color 1', 'seoengine' ),
            'default'  => '#26c6da',
        ), 
        array(
            'id'       => 'color_2',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Color 2', 'seoengine' ),
            'default'  => '#19abbd',
        ),
        array(
            'id'       => 'color_3',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Color 3', 'seoengine' ),
            'default'  => '#19abbd',
        ),
        array(
            'id'       => 'color_4',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Color 4', 'seoengine' ),
            'default'  => '#19abbd',
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => __( 'Main Logo', 'seoengine' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . 'logo-dark.png'
            ),
        ),
        array(
            'id'       => 'logo-footer',
            'type'     => 'media',
            'title'    => __( 'Footer Logo', 'seoengine' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . 'logo-dark.png'
            ),
        ),
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => __( 'Sticky Header', 'seoengine' ),
            'on'       => __( 'Enabled', 'seoengine' ),
            'off'      => __( 'Disabled', 'seoengine' ),
            'default'  => true,
            'subtitle' => __( 'Show header when scroll down', 'seoengine' ),
        ), 
        array(
            'id'       => 'tr_header',
            'type'     => 'switch',
            'title'    => __( 'Transparent Header', 'seoengine' ),
            'on'       => __( 'Enabled', 'seoengine' ),
            'off'      => __( 'Disabled', 'seoengine' ),
            'default'  => false,
            'subtitle' => __( 'You have to enable Banner or Slider in page to make it work properly. You can override this settings in individual pages', 'seoengine' ),
        ),
    )            
) 
);

// Informações de Contato
Redux::setSection( $opt_name, array(
    'title'            => __( 'Informações', 'seoengine' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'section-endereco',
            'type'     => 'section',
            'title'    => __( 'Endereço', 'seoengine' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'endereco',
            'type'     => 'text',
            'title'    => __( 'Endereço', 'seoengine' ),
            'default'  => 'Endereço',
        ),
        array(
            'id'       => 'endereco_link',
            'type'     => 'text',
            'title'    => __( 'Endereço Link', 'seoengine' ),
            'default'  => 'Endereço Link',
        ),
        array(
            'id'       => 'localizacao',
            'type'     => 'text',
            'title'    => __( 'Localização', 'seoengine' ),
            'default'  => 'Localização',
        ),
        array(
            'id'       => 'section-contato',
            'type'     => 'section',
            'title'    => __( 'Contato', 'seoengine' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'phone',
            'type'     => 'text',
            'title'    => __( 'Telefone', 'seoengine' ),
            'default'  => '+000000000',
        ),
        array(
            'id'       => 'whatsapp',
            'type'     => 'text',
            'title'    => __( 'WhatsApp', 'seoengine' ),
            'default'  => '+000000000',
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => __( 'Email', 'seoengine' ),
            'validate' => 'email',
            'default'  => 'info@radiustheme.com',
        ),
        array(
            'id'       => 'copia_email',
            'type'     => 'text',
            'title'    => __( 'Copia Email', 'seoengine' ),
            'validate' => 'email',
            'default'  => 'info@radiustheme.com',
        ),
        array(
            'id'       => 'section-social',
            'type'     => 'section',
            'title'    => __( 'Redes Sociais', 'seoengine' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => __( 'Facebook', 'seoengine' ),
            'default'  => '#',
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => __( 'Twitter', 'seoengine' ),
            'default'  => '#',
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => __( 'Youtube', 'seoengine' ),
            'default'  => '#',
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => __( 'Instagram', 'seoengine' ),
            'default'  => '#',
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => __( 'Linkedin', 'seoengine' ),
            'default'  => '#',
        )
    )            
) 
);

// Menu
Redux::setSection( $opt_name, array(
    'title'            => __( 'Main Menu', 'seoengine' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-align-justify',
    'fields' => array(
        array(
            'id'       => 'section-mainmenu',
            'type'     => 'section',
            'title'    => __( 'Main Menu Items', 'seoengine' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'menu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Menu Color', 'seoengine' ),
            'default'  => '#222222',
        ),
        array(
            'id'       => 'menu_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Transparent Menu Color', 'seoengine' ),
            'subtitle' => __( 'Applied when Transparent Header is enabled', 'seoengine' ),
            'default'  => '#fff',
        ),
        array(
            'id'       => 'menu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Menu Hover Color', 'seoengine' ),
            'default'  => '#26c6da',
        ),
        array(
            'id'       => 'menu_background_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Menu Background Hover Color', 'seoengine' ),
            'default'  => '#969696',
        ),
        array(
            'id'       => 'section-submenu',
            'type'     => 'section',
            'title'    => __( 'Sub Menu Items', 'seoengine' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'submenu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Submenu Color', 'seoengine' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'submenu_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Submenu Background Color', 'seoengine' ),
            'default'  => '#26c6da',
        ),  
        array(
            'id'       => 'submenu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Submenu Hover Color', 'seoengine' ),
            'default'  => '#071041',
        ), 
        array(
            'id'       => 'submenu_hover_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Submenu Hover Background Color', 'seoengine' ),
            'default'  => '#26c6da',
        ),  
        array(
            'id'       => 'resmenu_width',
            'type'     => 'slider',
            'title'    => __( 'Screen width in which mobile menu activated', 'seoengine' ),
            'subtitle' => __( 'Recommended value is: 991', 'seoengine' ),
            'default'  => 991,
            'min'      => 0,
            'step'     => 1,
            'max'      => 2000,
        ),     
    )            
) 
);

// Rodapé
Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'seoengine' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
        array(
            'id'       => 'section-footer-area',
            'type'     => 'section',
            'title'    => __( 'Footer Area', 'seoengine' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'footer_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Background Color', 'seoengine' ),
            'default'  => '#263238'
        ), 
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Title Text Color', 'seoengine' ),
            'default'  => '#ffffff'
        ), 
        array(
            'id'       => 'footer_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Body Text Color', 'seoengine' ),
            'default'  => '#b3b3b3'
        ), 
        array(
            'id'       => 'footer_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Body Link Color', 'seoengine' ),
            'default'  => '#e1e1e1'
        ), 
        array(
            'id'       => 'footer_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Body Link Hover Color', 'seoengine' ),
            'default'  => '#26c6da'
        ), 
        array(
            'id'       => 'section-copyright-area',
            'type'     => 'section',
            'title'    => __( 'Copyright Area', 'seoengine' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'copyright_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Copyright Background Color', 'seoengine' ),
            'default'  => '#212b30'
        ),
        array(
            'id'       => 'copyright_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Copyright Text Color', 'seoengine' ),
            'default'  => '#909da4'
        ),
        array(
            'id'       => 'copyright_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Copyright Link Color', 'seoengine' ),
            'default'  => '#909da4'
        )
    )            
) );

// Página de Erro
Redux::setSection( $opt_name, array(
    'title'   => __( 'Error Page Settings', 'seoengine' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => array( 
        array(
            'id'       => 'error_title',
            'type'     => 'text',
            'title'    => __( 'Page Title', 'seoengine' ),
            'default'  => __( 'Error 404', 'seoengine' ),
        ), 
        array(
            'id'       => 'error_bodybanner',
            'type'     => 'media',
            'title'    => __( 'Body Banner', 'seoengine' ),
            'subtitle' => __( 'Carregue sua imagem preferida. O formato PNG é recomendado', 'seoengine' ),
            'default'  => array(
                'url'=> RDTHEME_IMG_URL . '404.png'
            ),
        ), 
        array(
            'id'       => 'error_text1',
            'type'     => 'text',
            'title'    => __( 'Body Text 1', 'seoengine' ),
            'default'  => __( 'Página não encontrada', 'seoengine' ),
        ),
        array(
            'id'       => 'error_text2',
            'type'     => 'text',
            'title'    => __( 'Body Text 2', 'seoengine' ),
            'default'  => __( 'A página que você procura não está disponível ou foi removida. Tente ir para a página inicial usando o botão abaixo.', 'seoengine' ),
        ),   
        array(
            'id'       => 'error_buttontext',
            'type'     => 'text',
            'title'    => __( 'Button Text', 'seoengine' ),
            'default'  => __( 'Vá para a página inicial', 'seoengine' ),
        )
    )        
) 
);
// -> END Fields


// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', 'rdtheme_remove_demo' );
/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'rdtheme_remove_demo' ) ) {
    function rdtheme_remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
                ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}