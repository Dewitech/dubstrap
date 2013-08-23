<?php 
	$grep = get_option('dt_heading');
	$gfont = str_replace("+", " ",  $grep);
	$grep2 = get_option('dt_navfont');
	$gfont2 = str_replace("+", " ",  $grep2);
	$grep3 = get_option('dt_par');
	$gfont3 = str_replace("+", " ",  $grep3);
?>
<style>
h1,h2,h3,h4,h5,h6, .brand {font-family: <?php echo $gfont; ?>; letter-spacing: <?php echo get_option('dt_hlspacing'); ?> !important;}
.nav {font-family: "<?php echo $gfont2; ?>"; letter-spacing:<?php echo get_option('dt_navspacing'); ?> !important; font-size: <?php echo get_option('dt_navfsize'); ?>}
body, .hero-unit {font-family: "<?php echo $gfont3; ?>"; letter-spacing:<?php echo get_option('dt_pbspacing'); ?> !important; font-size: <?php echo get_option('dt_pfsize'); ?>}

</style>