jQuery('[rel=tooltip]').tooltip() 

//Tabable
jQuery('#tabable a').click(function (e) {
	e.preventDefault();
	jQuery(this).tab('show');
})