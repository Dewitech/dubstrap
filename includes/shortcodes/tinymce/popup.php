<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new dewitech_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="dewitech-popup">

	<div id="dewitech-shortcode-wrap">
		
		<div id="dewitech-sc-form-wrap">
		
			<div id="dewitech-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#dewitech-sc-form-head -->
			
			<form method="post" id="dewitech-sc-form">
			
				<table id="dewitech-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary dewitech-insert"><?php _e('Insert Shortcode','framework')?></a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#dewitech-sc-form-table -->
				
			</form>
			<!-- /#dewitech-sc-form -->
		
		</div>
		<!-- /#dewitech-sc-form-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#dewitech-shortcode-wrap -->

</div>
<!-- /#dewitech-popup -->

</body>
</html>