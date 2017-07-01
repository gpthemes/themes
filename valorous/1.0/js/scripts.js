// JavaScript Document
jQuery(document).ready(function($) {
	
	if($('#menu-social-links').length>0){
		
		$('#menu-social-links li').each(function(){
			var icon = $.trim($(this).find('a').html());
			$(this).addClass('v-'+icon);
			switch(icon){
				case 'google-plus':
				case 'facebook':				
				case 'twitter':
				case 'linkedin':
				case 'youtube':				
					$(this).find('a').html('<i class="fa fa-'+icon+'"></i>');
				break;
			}
		});
		
	}
	
});