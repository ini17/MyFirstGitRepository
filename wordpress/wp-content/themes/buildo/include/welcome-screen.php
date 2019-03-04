<?php
/**
 * Welcome Screen Class
 */
class buildo_screen {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'buildo_activation_admin_notice' ) );

	}
	
	public function buildo_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'buildo_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function buildo_admin_notice() {
		?>			
		<div class="updated notice is-dismissible construction-zone-notice">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Thanks for install %1$s , You rock!', 'buildo'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Welcome! Thank you for choosing buildo WordPress theme. For build your dream site theme has to offer visit our %1\$s welcome page %2\$s.", 'buildo'), '<a href="' . esc_url( admin_url( 'themes.php?page=buildo_upgrade' ) ) . '">', '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=buildo_upgrade' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with buildo','buildo'); ?></a></p>
		</div>
		<?php
	}
	
}

$GLOBALS['buildo_screen'] = new buildo_screen();