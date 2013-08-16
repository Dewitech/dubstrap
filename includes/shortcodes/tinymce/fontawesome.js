( function() {
	tinymce.create( 'tinymce.plugins.PilauSample', {
		init: function( ed, url ) {
			ed.addButton( 'pilau-sample', {
				title: 'Insert Sample',
				image: url + '/img/tinymce-sample.png',
				onclick: function() {
					text = prompt( "Enter text", "" );
					ed.execCommand( 'mceInsertContent', false, '[pilau-sample text="' + text + '"]' );
				}
			});
		},
		createControl: function( n, cm ) { return null; },
	});
	tinymce.PluginManager.add( 'pilau-sample', tinymce.plugins.PilauSample );
})();