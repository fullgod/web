jQuery(document).ready(function($){
	
	$(window).resize(function(){
		$('.ebor-header-options li div').each(function(){
			var $this = $(this),
				$type = $this.attr('data-type');
				
			if( $type == $this.parents('.ebor-header-options').next().find('input').attr('value') )
				$this.addClass('active');
		});
	});
	
	$('body').on('click','.ebor-header-options li div', function(){
		
		var $this = $(this),
			$type = $this.attr('data-type');
			
		$this.parents('.ebor-header-options').find('div').removeClass('active');
		$this.addClass('active');
		
		$this.parents('.ebor-header-options').next().find('input').attr({ 'value' : $type });
		
	});
	
	$(window).trigger('resize');
	
});