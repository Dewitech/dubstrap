jQuery('[rel=tooltip]').tooltip() 

//Tabable
jQuery('#tabable a').click(function (e) {
	e.preventDefault();
	jQuery(this).tab('show');
})

//prettyPhoto	
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		theme:'dark_square',
		deeplinking: false
		}
);