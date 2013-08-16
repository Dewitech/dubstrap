
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var dewitechs = {
    	loadVals: function()
    	{
    		var shortcode = $('#_dewitech_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.dewitech-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('dewitech_', ''),		// gets rid of the dewitech_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_dewitech_ushortcode').remove();
    		$('#dewitech-sc-form-table').prepend('<div id="_dewitech_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_dewitech_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.dewitech-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('dewitech_', '')		// gets rid of the dewitech_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_dewitech_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_dewitech_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_dewitech_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_dewitech_ushortcode').remove();
    		$('#dewitech-sc-form-table').prepend('<div id="_dewitech_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				dewitechPopup = $('#dewitech-popup');

            tbWindow.css({
                //height: dewitechPopup.outerHeight() + 50,
                height: 550,
				
				width: dewitechPopup.outerWidth() +0,
                marginLeft: -(dewitechPopup.outerWidth()/2)
            });

			ajaxCont.css({
				
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: 500,
				width: 560,
				//height: (tbWindow.outerHeight()-47),
				overflow: 'auto', // IMPORTANT
				//width: dewitechPopup.outerWidth()
			});
			
			$('#dewitech-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	dewitechs = this,
    			popup = $('#dewitech-popup'),
    			form = $('#dewitech-sc-form', popup),
    			shortcode = $('#_dewitech_shortcode', form).text(),
    			popupType = $('#_dewitech_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		dewitechs.resizeTB();
    		$(window).resize(function() { dewitechs.resizeTB() });
    		
    		// initialise
    		dewitechs.loadVals();
    		dewitechs.children();
    		dewitechs.cLoadVals();
    		
    		// update on children value change
    		$('.dewitech-cinput', form).live('change', function() {
    			dewitechs.cLoadVals();
    		});
    		
    		// update on value change
    		$('.dewitech-input', form).change(function() {
    			dewitechs.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.dewitech-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_dewitech_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#dewitech-popup').livequery( function() { dewitechs.load(); } );
});