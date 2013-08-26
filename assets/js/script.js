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

//Dropdown Hover
jQuery(document).ready(function ($) {
$('.navbar .dropdown').hover(function() {
	$(this).addClass('didropdown').find('.dropdown-menu').first().stop(true, true).delay(100).slideDown();
}, function() {
	var na = $(this)
	na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function(){ na.removeClass('extra-nav-class') })
});

$('.dropdown-submenu').hover(function() {
	$(this).addClass('extra-nav-class').find('.dropdown-menu').first().stop(true, true).delay(100).slideDown();
}, function() {
	var na = $(this)
	na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function(){ na.removeClass('extra-nav-class') })
});

});	