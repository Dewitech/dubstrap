<?php 
	$grep = get_option('dt_heading');
	$gfont = str_replace("+", " ",  $grep);
	$grep2 = get_option('dt_par');
	$gfont2 = str_replace("+", " ",  $grep2);
?>
<style>
h1,h2,h3,h4,h5,h6 {font-family: <?php echo $gfont; ?>; letter-spacing: <?php echo get_option('dt_hlspacing'); ?>;}
body {font-family: "<?php echo $gfont2; ?>"; letter-spacing:<?php echo get_option('dt_pbspacing'); ?>}

</style>