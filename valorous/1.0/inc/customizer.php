<?php


if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * A class to create a dropdown for all categories in your wordpress site
 */
 class Category_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $cats = false;
    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);
        parent::__construct( $manager, $id, $args );
    }
    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }


function gp_customizer_extras($wp_customize) {   

	
	
	$wp_customize->add_section('vfront_page', array(
		'title' => 'Home Page',
	));  
	
	
	
    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('gp_theme_options[menu_bar_color]', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'menu_bar_color', array(
        'label'    => __('Menu Bar Color', 'valorous'),
        'section' => 'vfront_page',
        'settings' => 'gp_theme_options[menu_bar_color]',
		
    )));		
	

    //  =============================
    //  = Page Dropdown             =
    //  =============================
    $wp_customize->add_setting('gp_theme_options[home_content_top]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('home_content_top', array(
        'label'      => __('Content Top', 'valorous'),
        'section'    => 'vfront_page',
        'type'    => 'dropdown-pages',
        'settings'   => 'gp_theme_options[home_content_top]',
    ));
	
    $wp_customize->add_setting('gp_theme_options[home_content_bottom]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option', 
    ));
  	
    $wp_customize->add_control('home_content_bottom', array(
        'label'      => __('Content Bottom', 'valorous'),
        'section'    => 'vfront_page',
        'type'    => 'dropdown-pages',
        'settings'   => 'gp_theme_options[home_content_bottom]',
    ));	




}
add_action( 'customize_register' , 'gp_customizer_extras' );

