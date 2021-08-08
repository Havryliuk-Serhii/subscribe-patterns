<?php
namespace Subscribe;
/**
 * 
 */
class Subscribe_Shortcode
{
	
	function __construct()
	{
		add_shortcode( 'subscribe_form', [ $this, 'form' ] );
	}

	public function form() {

		wp_enqueue_style( 'subscribe' );
		wp_enqueue_script( 'subscribe' );
		ob_start();
		?>
		<form action="" method="POST" class="subscribe-form">
			<div class="subscribe-form-row">
				<input type="email" name="email" class="subscribe-form-field" required>
				<button type="submit" class="subscribe-form-button"><?php echo esc_html( 'Subscribe', 'subscribe' ); ?></button>
			</div>
			<div class="subscribe-form-message" style="display: none"></div>
		</form>
		<?php
		return ob_get_clean();
	}

}
