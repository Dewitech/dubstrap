<?php
/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'dubstrap-featured', 640, 300, true );
add_image_size( 'dubstrap-featured-home', 970, 500, true);
add_image_size( 'dubstrap-featured-carousel', 970, 400, true);
add_image_size( 'dubstrap-thumb-600', 600, 400, false );
add_image_size( 'dubstrap-thumb-300', 300, 200, true );
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

*/

?>