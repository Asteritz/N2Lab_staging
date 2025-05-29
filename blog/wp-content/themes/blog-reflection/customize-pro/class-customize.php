<?php 
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class blogreflection_upsell_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function blogreflection_upsell_get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->blogreflection_upsell_setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function blogreflection_upsell_setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'blogreflection_upsell_sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'blogreflection_upsell_enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function blogreflection_upsell_sections( $manager ) {
		$blog_reflection_ad_url = home_url().'/wp-admin/admin.php?page=blog-reflection-addons';
		// Load custom sections.
		get_template_part( 'customize-pro/section', 'pro' );

		// Register custom section types.
		$manager->register_section_type( 'blogreflection_upsell_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new blogreflection_upsell_Customize_Section_Pro(
				$manager,
				'blogreflection-upsell',
				array(
					'title'    => esc_html__( 'Upgrade to Pro', 'blog-reflection' ),
					'pro_text' => esc_html__( 'Upgrade Now', 'blog-reflection' ),
					'pro_url'  => esc_url($blog_reflection_ad_url),
					'priority'   => 0,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function blogreflection_upsell_enqueue_control_scripts() {
		wp_enqueue_script( 'blogreflection-upsell-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'blogreflection-upsell-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/customize-controls.css' );
	}
}
if (!class_exists('Blog_reflection_pro')) {
// Doing this customizer thang!
blogreflection_upsell_Customize::blogreflection_upsell_get_instance();
}