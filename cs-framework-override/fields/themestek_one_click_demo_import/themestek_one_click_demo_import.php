<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Padding
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_themestek_one_click_demo_import extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo wp_kses( $this->element_before(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);

	$value        = $this->element_value();
   
   wp_enqueue_style(
		'ts-one-click-demo-setup',
		get_template_directory_uri() . '/cs-framework-override/fields/themestek_one_click_demo_import/themestek_one_click_demo_import.css',
		time(),
		true
	);
   wp_enqueue_script(
		'ts-one-click-demo-setup',
		get_template_directory_uri() . '/cs-framework-override/fields/themestek_one_click_demo_import/themestek_one_click_demo_import.js',
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
   
	// CONTENT START
	$error           = array();
	$button_disabled = "";
	
	// checking if "Optico Demo Content Setup" plugin is installed
	if( function_exists('themestek_optico_one_click_html') ){
		$button_disabled = "";
	} else {
		$button_disabled = "disabled";
		$error[]         = esc_attr__('The "ThemeStek Extras for Optico" plugin is not installed or activated. This plugin is required to Import Demo Content.', 'optico');
	}
	
	// checking if "Contact Form 7" plugin is installed
	if( !defined('WPCF7_VERSION') ){
		$button_disabled = "disabled";
		$error[]         = esc_attr__('The "Contact Form 7" plugin is not installed or activated. This plugin is required to Import Demo Content. So please install it.', 'optico');
	}
	
	?>

	<div class="themestek-one-click-demo-content-w">
		
		<?php if( !empty($_GET['tsdemosuccess']) && $_GET['tsdemosuccess']=='yes' ) : ?>
		<div class="ts-demo-setup-success-message">
			<i class="fa fa-check"></i> &nbsp; 
			<?php esc_attr_e('Demo setup done successfully! Now you can start to edit your site', 'optico'); ?>
		</div>
		<?php endif; ?>
		
		<div id="import-demo-data-results-wrapper">
		
			<?php if( count($error)>0 ){ ?>
			
				<div class="alert-info ts-one-click-error-message">
					<h4><?php esc_attr_e( 'Please correct the errors given below:', 'optico' ) ?></h4>
					<ul>
					<?php
					foreach( $error as $line ){
						echo '<li>' . sprintf( esc_attr__('%s ', 'optico' ) , $line ) . '</li>';
					}
					?>
					</ul>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) ?>"><?php esc_attr_e('Click here to install the plugin(s)', 'optico' ); ?></a> &nbsp; 
					<a href="#" class="ts-one-click-error-close"><?php esc_attr_e('Close', 'optico' ); ?></a>
				</div>
			
			<?php } else { ?>
			
				<?php
				if( function_exists('themestek_optico_one_click_html') ){
					themestek_optico_one_click_html();
				}
				?>
			
			<?php }; ?>
			
		</div>
		
		<div class="clear"></div>
	
	</div><!-- .themestek-one-click-demo-content-w -->
		
   <?php
   
   // CONTENT END
   
    echo wp_kses( $this->element_after(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);

  }

}