(function ()
{
	// create dewitechShortcodes plugin
	tinymce.create("tinymce.plugins.dewitechShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("dewitechPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Theme Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
			
			
		},
		createControl: function ( btn, e )
		{
			if ( btn == "dewitech_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('dewitech_button', {
                    title: "Insert Shortcode",
					image: dewitechShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });
				

                btn.onRenderMenu.add(function (c, b)
				{					
					c=b.addMenu({title:"1. Span"});
						a.addImmediate( c,"span1","[span1]Replace your content[/span1]" );
						a.addImmediate( c,"span2","[span2]Replace your content[/span2]" );
						a.addImmediate( c,"span3","[span3]Replace your content[/span3]" );
						a.addImmediate( c,"span4","[span4]Replace your content[/span4]" );
						a.addImmediate( c,"span5","[span5]Replace your content[/span5]" );
						a.addImmediate( c,"span6","[span6]Replace your content[/span6]" );
						a.addImmediate( c,"span7","[span7]Replace your content[/span7]" );
						a.addImmediate( c,"span8","[span8]Replace your content[/span8]" );
						a.addImmediate( c,"span9","[span9]Replace your content[/span9]" );
						a.addImmediate( c,"span10","[span10]Replace your content[/span10]" );
						a.addImmediate( c,"span11","[span11]Replace your content[/span11]" );
						a.addImmediate( c,"span12","[span12]Replace your content[/span12]" );
					a.addWithPopup( b, "2. Buttons", "button" );
					a.addImmediate( b, "3. Blockquote", "[blockquote]Replace your content[/blockquote]" );
					a.addWithPopup( b, "4. Columns", "columns" );
					a.addWithPopup( b, "5. Contact form", "contactform" );
					c=b.addMenu({title:"6. Divider"});
						a.addImmediate( c,"Default (no margin top)","[divider type=\"nomargintop\"]" );
						a.addImmediate( c,"Default (small margin)","[divider type=\"smallmargin\"]" );
						a.addImmediate( c,"Default (small margin & no margin top)","[divider type=\"smallmargin nomargintop\"]" );
						a.addImmediate( c,"Default (large margin)","[divider type=\"largemargin\"]" );
						a.addImmediate( c,"Default (large margin & no margin top)","[divider type=\"largemargin nomargintop\"]" );
					c=b.addMenu({title:"7. Dropcap"});
						a.addImmediate( c,"Default Dropcap","[dropcap]1[/dropcap]" );
						a.addImmediate( c,"Dropcap color (default by theme)","[dropcap type=\"primary\"]1[/dropcap]" );
						a.addImmediate( c,"First letter (no background)","[dropcap type=\"letter\"]C[/dropcap]" );
						a.addImmediate( c,"Circle Dropcap","[dropcap type=\"circle\"]1[/dropcap]" );
						a.addImmediate( c,"Circle Dropcap color (default by theme)","[dropcap type=\"circleprimary\"]1[/dropcap]" );
						a.addImmediate( c,"Quote mark","[dropcap type=\"quote\"]1[/dropcap]" );					

					a.addWithPopup( b, "8. List", "list" );
					a.addWithPopup( b, "9. Notification", "notification" );
					c=b.addMenu({title:"10. Pricing Table"});
						a.addWithPopup( c, "Add new Table", "pricingtable" );	
						a.addWithPopup( c, "Add Features Column", "pricingfeatures" );	
						a.addWithPopup( c, "Add Plan Column", "pricingplan" );				
						a.addImmediate( c, "Icon check","[pt_icon_check]" );
						a.addImmediate( c, "Icon cross","[pt_icon_cross]" );

					c=b.addMenu({title:"11. Table"});
						a.addImmediate( c, "Table (table)","[table][/table]" );
						a.addImmediate( c, "Group header (thead)","[thead][/thead]" );
						a.addImmediate( c, "Group body (tbody)","[tbody][/tbody]" );
						a.addImmediate( c, "Rows (tr)","[tr][/tr]" );
						a.addImmediate( c, "Header cell (th)","[th][/th]" );
						a.addImmediate( c, "Standard cell (td)","[td][/td]" );
					a.addWithPopup( b, "12. Video", "video" );
					c=b.addMenu({title:"13. Tooltip"});
						a.addImmediate( c,"Tooltip Top","[tooltiptop]Tooltip Top[/tooltiptop]" );
						a.addImmediate( c,"Tooltip Right","[tooltipright]Tooltip Right[/tooltipright]" );
						a.addImmediate( c,"Tooltip Bottom","[tooltipbottom]Tooltip Bottom[/tooltipbottom]" );
						a.addImmediate( c,"Tooltip Left","[tooltipleft]Tooltip Left[/tooltipleft]" );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("dewitechPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Dewitech Shortcodes',
				author: 'Dewitech',
				authorurl: 'http://dewitech.com/',
				infourl: 'http://dewitech.com/',
				version: "1.0"
			}
		}
	});
	
	
	// add dewitechShortcodes plugin
	tinymce.PluginManager.add("dewitechShortcodes", tinymce.plugins.dewitechShortcodes);
	
})();

