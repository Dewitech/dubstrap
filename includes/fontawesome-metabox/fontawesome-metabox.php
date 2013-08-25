<?php /* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'fontawesome_icon_meta_boxes_setup' );
add_action( 'load-post-new.php', 'fontawesome_icon_meta_boxes_setup' );

/* Meta box setup function. */
function fontawesome_icon_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'fontawesome_add_post_meta_boxes' );

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'fontawesome_save_post_class_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function fontawesome_add_post_meta_boxes() {

	add_meta_box(
		'fontawesome-post-class',			// Unique ID
		esc_html__( 'Post Class', 'example' ),		// Title
		'fontawesome_icon_class_meta_box',		// Callback function
		'post',					// Admin page (or post type)
		'side',					// Context
		'default'					// Priority
	);
}

/* Display the post meta box. */
function fontawesome_icon_class_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'fontawesome_icon_class_nonce' ); ?>

	<p>
		<label for="fontawesome-post-class"><?php _e( "Add a custom CSS class, which will be applied to WordPress' post class.", 'example' ); ?></label>
		<br />
		<select class="widefat" name="fontawesome-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, 'fontawesome_icon_class', true ) ); ?>" />
			<option value='icon-adjust'>adjust</option>
			<option value='icon-adn'>adn</option>
			<option value='icon-align-center'>align-center</option>
			<option value='icon-align-justify'>align-justify</option>
			<option value='icon-align-left'>align-left</option>
			<option value='icon-align-right'>align-right</option>
			<option value='icon-ambulance'>ambulance</option>
			<option value='icon-anchor'>anchor</option>
			<option value='icon-android'>android</option>
			<option value='icon-angle-down'>angle-down</option>
			<option value='icon-angle-left'>angle-left</option>
			<option value='icon-angle-right'>angle-right</option>
			<option value='icon-angle-up'>angle-up</option>
			<option value='icon-apple'>apple</option>
			<option value='icon-archive'>archive</option>
			<option value='icon-arrow-down'>arrow-down</option>
			<option value='icon-arrow-left'>arrow-left</option>
			<option value='icon-arrow-right'>arrow-right</option>
			<option value='icon-arrow-up'>arrow-up</option>
			<option value='icon-asterisk'>asterisk</option>
			<option value='icon-backward'>backward</option>
			<option value='icon-ban-circle'>ban-circle</option>
			<option value='icon-bar-chart'>bar-chart</option>
			<option value='icon-barcode'>barcode</option>
			<option value='icon-beaker'>beaker</option>
			<option value='icon-beer'>beer</option>
			<option value='icon-bell'>bell</option>
			<option value='icon-bell-alt'>bell-alt</option>
			<option value='icon-bitbucket'>bitbucket</option>
			<option value='icon-bitbucket-sign'>bitbucket-sign</option>
			<option value='icon-bold'>bold</option>
			<option value='icon-bolt'>bolt</option>
			<option value='icon-book'>book</option>
			<option value='icon-bookmark'>bookmark</option>
			<option value='icon-bookmark-empty'>bookmark-empty</option>
			<option value='icon-briefcase'>briefcase</option>
			<option value='icon-btc'>btc</option>
			<option value='icon-bug'>bug</option>
			<option value='icon-building'>building</option>
			<option value='icon-bullhorn'>bullhorn</option>
			<option value='icon-bullseye'>bullseye</option>
			<option value='icon-calendar'>calendar</option>
			<option value='icon-calendar-empty'>calendar-empty</option>
			<option value='icon-camera'>camera</option>
			<option value='icon-camera-retro'>camera-retro</option>
			<option value='icon-caret-down'>caret-down</option>
			<option value='icon-caret-left'>caret-left</option>
			<option value='icon-caret-right'>caret-right</option>
			<option value='icon-caret-up'>caret-up</option>
			<option value='icon-certificate'>certificate</option>
			<option value='icon-check'>check</option>
			<option value='icon-check-empty'>check-empty</option>
			<option value='icon-check-minus'>check-minus</option>
			<option value='icon-check-sign'>check-sign</option>
			<option value='icon-chevron-down'>chevron-down</option>
			<option value='icon-chevron-left'>chevron-left</option>
			<option value='icon-chevron-right'>chevron-right</option>
			<option value='icon-chevron-sign-down'>chevron-sign-down</option>
			<option value='icon-chevron-sign-left'>chevron-sign-left</option>
			<option value='icon-chevron-sign-right'>chevron-sign-right</option>
			<option value='icon-chevron-sign-up'>chevron-sign-up</option>
			<option value='icon-chevron-up'>chevron-up</option>
			<option value='icon-circle'>circle</option>
			<option value='icon-circle-arrow-down'>circle-arrow-down</option>
			<option value='icon-circle-arrow-left'>circle-arrow-left</option>
			<option value='icon-circle-arrow-right'>circle-arrow-right</option>
			<option value='icon-circle-arrow-up'>circle-arrow-up</option>
			<option value='icon-circle-blank'>circle-blank</option>
			<option value='icon-cloud'>cloud</option>
			<option value='icon-cloud-download'>cloud-download</option>
			<option value='icon-cloud-upload'>cloud-upload</option>
			<option value='icon-cny'>cny</option>
			<option value='icon-code'>code</option>
			<option value='icon-code-fork'>code-fork</option>
			<option value='icon-coffee'>coffee</option>
			<option value='icon-cog'>cog</option>
			<option value='icon-cogs'>cogs</option>
			<option value='icon-collapse'>collapse</option>
			<option value='icon-collapse-alt'>collapse-alt</option>
			<option value='icon-collapse-top'>collapse-top</option>
			<option value='icon-columns'>columns</option>
			<option value='icon-comment'>comment</option>
			<option value='icon-comment-alt'>comment-alt</option>
			<option value='icon-comments'>comments</option>
			<option value='icon-comments-alt'>comments-alt</option>
			<option value='icon-compass'>compass</option>
			<option value='icon-copy'>copy</option>
			<option value='icon-credit-card'>credit-card</option>
			<option value='icon-crop'>crop</option>
			<option value='icon-css3'>css3</option>
			<option value='icon-cut'>cut</option>
			<option value='icon-dashboard'>dashboard</option>
			<option value='icon-desktop'>desktop</option>
			<option value='icon-double-angle-down'>double-angle-down</option>
			<option value='icon-double-angle-left'>double-angle-left</option>
			<option value='icon-double-angle-right'>double-angle-right</option>
			<option value='icon-double-angle-up'>double-angle-up</option>
			<option value='icon-download'>download</option>
			<option value='icon-download-alt'>download-alt</option>
			<option value='icon-dribbble'>dribbble</option>
			<option value='icon-dropbox'>dropbox</option>
			<option value='icon-edit'>edit</option>
			<option value='icon-edit-sign'>edit-sign</option>
			<option value='icon-eject'>eject</option>
			<option value='icon-ellipsis-horizontal'>ellipsis-horizontal</option>
			<option value='icon-ellipsis-vertical'>ellipsis-vertical</option>
			<option value='icon-envelope'>envelope</option>
			<option value='icon-envelope-alt'>envelope-alt</option>
			<option value='icon-eraser'>eraser</option>
			<option value='icon-eur'>eur</option>
			<option value='icon-exchange'>exchange</option>
			<option value='icon-exclamation'>exclamation</option>
			<option value='icon-exclamation-sign'>exclamation-sign</option>
			<option value='icon-expand'>expand</option>
			<option value='icon-expand-alt'>expand-alt</option>
			<option value='icon-external-link'>external-link</option>
			<option value='icon-external-link-sign'>external-link-sign</option>
			<option value='icon-eye-close'>eye-close</option>
			<option value='icon-eye-open'>eye-open</option>
			<option value='icon-facebook'>facebook</option>
			<option value='icon-facebook-sign'>facebook-sign</option>
			<option value='icon-facetime-video'>facetime-video</option>
			<option value='icon-fast-backward'>fast-backward</option>
			<option value='icon-fast-forward'>fast-forward</option>
			<option value='icon-female'>female</option>
			<option value='icon-fighter-jet'>fighter-jet</option>
			<option value='icon-file'>file</option>
			<option value='icon-file-alt'>file-alt</option>
			<option value='icon-file-text'>file-text</option>
			<option value='icon-file-text-alt'>file-text-alt</option>
			<option value='icon-film'>film</option>
			<option value='icon-filter'>filter</option>
			<option value='icon-fire'>fire</option>
			<option value='icon-fire-extinguisher'>fire-extinguisher</option>
			<option value='icon-flag'>flag</option>
			<option value='icon-flag-alt'>flag-alt</option>
			<option value='icon-flag-checkered'>flag-checkered</option>
			<option value='icon-flickr'>flickr</option>
			<option value='icon-folder-close'>folder-close</option>
			<option value='icon-folder-close-alt'>folder-close-alt</option>
			<option value='icon-folder-open'>folder-open</option>
			<option value='icon-folder-open-alt'>folder-open-alt</option>
			<option value='icon-font'>font</option>
			<option value='icon-food'>food</option>
			<option value='icon-forward'>forward</option>
			<option value='icon-foursquare'>foursquare</option>
			<option value='icon-frown'>frown</option>
			<option value='icon-fullscreen'>fullscreen</option>
			<option value='icon-gamepad'>gamepad</option>
			<option value='icon-gbp'>gbp</option>
			<option value='icon-gift'>gift</option>
			<option value='icon-github'>github</option>
			<option value='icon-github-alt'>github-alt</option>
			<option value='icon-github-sign'>github-sign</option>
			<option value='icon-gittip'>gittip</option>
			<option value='icon-glass'>glass</option>
			<option value='icon-globe'>globe</option>
			<option value='icon-google-plus'>google-plus</option>
			<option value='icon-google-plus-sign'>google-plus-sign</option>
			<option value='icon-group'>group</option>
			<option value='icon-hand-down'>hand-down</option>
			<option value='icon-hand-left'>hand-left</option>
			<option value='icon-hand-right'>hand-right</option>
			<option value='icon-hand-up'>hand-up</option>
			<option value='icon-hdd'>hdd</option>
			<option value='icon-headphones'>headphones</option>
			<option value='icon-heart'>heart</option>
			<option value='icon-heart-empty'>heart-empty</option>
			<option value='icon-home'>home</option>
			<option value='icon-hospital'>hospital</option>
			<option value='icon-h-sign'>h-sign</option>
			<option value='icon-html5'>html5</option>
			<option value='icon-inbox'>inbox</option>
			<option value='icon-indent-left'>indent-left</option>
			<option value='icon-indent-right'>indent-right</option>
			<option value='icon-info'>info</option>
			<option value='icon-info-sign'>info-sign</option>
			<option value='icon-inr'>inr</option>
			<option value='icon-instagram'>instagram</option>
			<option value='icon-italic'>italic</option>
			<option value='icon-jpy'>jpy</option>
			<option value='icon-key'>key</option>
			<option value='icon-keyboard'>keyboard</option>
			<option value='icon-krw'>krw</option>
			<option value='icon-laptop'>laptop</option>
			<option value='icon-leaf'>leaf</option>
			<option value='icon-legal'>legal</option>
			<option value='icon-lemon'>lemon</option>
			<option value='icon-level-down'>level-down</option>
			<option value='icon-level-up'>level-up</option>
			<option value='icon-lightbulb'>lightbulb</option>
			<option value='icon-link'>link</option>
			<option value='icon-linkedin'>linkedin</option>
			<option value='icon-linkedin-sign'>linkedin-sign</option>
			<option value='icon-linux'>linux</option>
			<option value='icon-list'>list</option>
			<option value='icon-list-alt'>list-alt</option>
			<option value='icon-list-ol'>list-ol</option>
			<option value='icon-list-ul'>list-ul</option>
			<option value='icon-location-arrow'>location-arrow</option>
			<option value='icon-lock'>lock</option>
			<option value='icon-long-arrow-down'>long-arrow-down</option>
			<option value='icon-long-arrow-left'>long-arrow-left</option>
			<option value='icon-long-arrow-right'>long-arrow-right</option>
			<option value='icon-long-arrow-up'>long-arrow-up</option>
			<option value='icon-magic'>magic</option>
			<option value='icon-magnet'>magnet</option>
			<option value='icon-mail-reply-all'>mail-reply-all</option>
			<option value='icon-male'>male</option>
			<option value='icon-map-marker'>map-marker</option>
			<option value='icon-maxcdn'>maxcdn</option>
			<option value='icon-medkit'>medkit</option>
			<option value='icon-meh'>meh</option>
			<option value='icon-microphone'>microphone</option>
			<option value='icon-microphone-off'>microphone-off</option>
			<option value='icon-minus'>minus</option>
			<option value='icon-minus-sign'>minus-sign</option>
			<option value='icon-minus-sign-alt'>minus-sign-alt</option>
			<option value='icon-mobile-phone'>mobile-phone</option>
			<option value='icon-money'>money</option>
			<option value='icon-moon'>moon</option>
			<option value='icon-move'>move</option>
			<option value='icon-music'>music</option>
			<option value='icon-off'>off</option>
			<option value='icon-ok'>ok</option>
			<option value='icon-ok-circle'>ok-circle</option>
			<option value='icon-ok-sign'>ok-sign</option>
			<option value='icon-paper-clip'>paper-clip</option>
			<option value='icon-paste'>paste</option>
			<option value='icon-pause'>pause</option>
			<option value='icon-pencil'>pencil</option>
			<option value='icon-phone'>phone</option>
			<option value='icon-phone-sign'>phone-sign</option>
			<option value='icon-picture'>picture</option>
			<option value='icon-pinterest'>pinterest</option>
			<option value='icon-pinterest-sign'>pinterest-sign</option>
			<option value='icon-plane'>plane</option>
			<option value='icon-play'>play</option>
			<option value='icon-play-circle'>play-circle</option>
			<option value='icon-play-sign'>play-sign</option>
			<option value='icon-plus'>plus</option>
			<option value='icon-plus-sign'>plus-sign</option>
			<option value='icon-plus-sign-alt'>plus-sign-alt</option>
			<option value='icon-print'>print</option>
			<option value='icon-pushpin'>pushpin</option>
			<option value='icon-puzzle-piece'>puzzle-piece</option>
			<option value='icon-qrcode'>qrcode</option>
			<option value='icon-question'>question</option>
			<option value='icon-question-sign'>question-sign</option>
			<option value='icon-quote-left'>quote-left</option>
			<option value='icon-quote-right'>quote-right</option>
			<option value='icon-random'>random</option>
			<option value='icon-refresh'>refresh</option>
			<option value='icon-remove'>remove</option>
			<option value='icon-remove-circle'>remove-circle</option>
			<option value='icon-remove-sign'>remove-sign</option>
			<option value='icon-reorder'>reorder</option>
			<option value='icon-repeat'>repeat</option>
			<option value='icon-reply'>reply</option>
			<option value='icon-reply-all'>reply-all</option>
			<option value='icon-resize-full'>resize-full</option>
			<option value='icon-resize-horizontal'>resize-horizontal</option>
			<option value='icon-resize-small'>resize-small</option>
			<option value='icon-resize-vertical'>resize-vertical</option>
			<option value='icon-retweet'>retweet</option>
			<option value='icon-road'>road</option>
			<option value='icon-rocket'>rocket</option>
			<option value='icon-rss'>rss</option>
			<option value='icon-rss-sign'>rss-sign</option>
			<option value='icon-save'>save</option>
			<option value='icon-screenshot'>screenshot</option>
			<option value='icon-search'>search</option>
			<option value='icon-share'>share</option>
			<option value='icon-share-alt'>share-alt</option>
			<option value='icon-share-sign'>share-sign</option>
			<option value='icon-shield'>shield</option>
			<option value='icon-shopping-cart'>shopping-cart</option>
			<option value='icon-signal'>signal</option>
			<option value='icon-sign-blank'>sign-blank</option>
			<option value='icon-signin'>signin</option>
			<option value='icon-signout'>signout</option>
			<option value='icon-sitemap'>sitemap</option>
			<option value='icon-skype'>skype</option>
			<option value='icon-smile'>smile</option>
			<option value='icon-sort'>sort</option>
			<option value='icon-sort-by-alphabet'>sort-by-alphabet</option>
			<option value='icon-sort-by-alphabet-alt'>sort-by-alphabet-alt</option>
			<option value='icon-sort-by-attributes'>sort-by-attributes</option>
			<option value='icon-sort-by-attributes-alt'>sort-by-attributes-alt</option>
			<option value='icon-sort-by-order'>sort-by-order</option>
			<option value='icon-sort-by-order-alt'>sort-by-order-alt</option>
			<option value='icon-sort-down'>sort-down</option>
			<option value='icon-sort-up'>sort-up</option>
			<option value='icon-spinner'>spinner</option>
			<option value='icon-stackexchange'>stackexchange</option>
			<option value='icon-star'>star</option>
			<option value='icon-star-empty'>star-empty</option>
			<option value='icon-star-half'>star-half</option>
			<option value='icon-star-half-empty'>star-half-empty</option>
			<option value='icon-step-backward'>step-backward</option>
			<option value='icon-step-forward'>step-forward</option>
			<option value='icon-stethoscope'>stethoscope</option>
			<option value='icon-stop'>stop</option>
			<option value='icon-strikethrough'>strikethrough</option>
			<option value='icon-subscript'>subscript</option>
			<option value='icon-suitcase'>suitcase</option>
			<option value='icon-sun'>sun</option>
			<option value='icon-superscript'>superscript</option>
			<option value='icon-table'>table</option>
			<option value='icon-tablet'>tablet</option>
			<option value='icon-tag'>tag</option>
			<option value='icon-tags'>tags</option>
			<option value='icon-tasks'>tasks</option>
			<option value='icon-terminal'>terminal</option>
			<option value='icon-text-height'>text-height</option>
			<option value='icon-text-width'>text-width</option>
			<option value='icon-th'>th</option>
			<option value='icon-th-large'>th-large</option>
			<option value='icon-th-list'>th-list</option>
			<option value='icon-thumbs-down'>thumbs-down</option>
			<option value='icon-thumbs-down-alt'>thumbs-down-alt</option>
			<option value='icon-thumbs-up'>thumbs-up</option>
			<option value='icon-thumbs-up-alt'>thumbs-up-alt</option>
			<option value='icon-ticket'>ticket</option>
			<option value='icon-time'>time</option>
			<option value='icon-tint'>tint</option>
			<option value='icon-trash'>trash</option>
			<option value='icon-trello'>trello</option>
			<option value='icon-trophy'>trophy</option>
			<option value='icon-truck'>truck</option>
			<option value='icon-tumblr'>tumblr</option>
			<option value='icon-tumblr-sign'>tumblr-sign</option>
			<option value='icon-twitter'>twitter</option>
			<option value='icon-twitter-sign'>twitter-sign</option>
			<option value='icon-umbrella'>umbrella</option>
			<option value='icon-underline'>underline</option>
			<option value='icon-undo'>undo</option>
			<option value='icon-unlink'>unlink</option>
			<option value='icon-unlock'>unlock</option>
			<option value='icon-unlock-alt'>unlock-alt</option>
			<option value='icon-upload'>upload</option>
			<option value='icon-upload-alt'>upload-alt</option>
			<option value='icon-usd'>usd</option>
			<option value='icon-user'>user</option>
			<option value='icon-user-md'>user-md</option>
			<option value='icon-vk'>vk</option>
			<option value='icon-volume-down'>volume-down</option>
			<option value='icon-volume-off'>volume-off</option>
			<option value='icon-volume-up'>volume-up</option>
			<option value='icon-warning-sign'>warning-sign</option>
			<option value='icon-weibo'>weibo</option>
			<option value='icon-windows'>windows</option>
			<option value='icon-wrench'>wrench</option>
			<option value='icon-xing'>xing</option>
			<option value='icon-xing-sign'>xing-sign</option>
			<option value='icon-youtube'>youtube</option>
			<option value='icon-youtube-play'>youtube-play</option>
			<option value='icon-youtube-sign'>youtube-sign</option>
			<option value='icon-zoom-in'>zoom-in</option>
			<option value='icon-zoom-out'>zoom-out</option>

		</select>
	</p>
<?php }

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'fontawesome_save_post_class_meta', 10, 2 );


/* Save the meta box's post metadata. */
function fontawesome_save_post_class_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['fontawesome_icon_class_nonce'] ) || !wp_verify_nonce( $_POST['fontawesome_icon_class_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = ( isset( $_POST['fontawesome-post-class'] ) ? sanitize_html_class( $_POST['fontawesome-post-class'] ) : '' );

	/* Get the meta key. */
	$meta_key = 'fontawesome_icon_class';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'fontawesome_icon_class' );

function fontawesome_icon_class( $classes ) {

	/* Get the current post ID. */
	$post_id = get_the_ID();

	/* If we have a post ID, proceed. */
	if ( !empty( $post_id ) ) {

		/* Get the custom post class. */
		$post_class = get_post_meta( $post_id, 'fontawesome_icon_class', true );

		/* If a post class was input, sanitize it and add it to the post class array. */
		if ( !empty( $post_class ) )
			$classes[] = sanitize_html_class( $post_class );
	}

	return $classes;
}

?>