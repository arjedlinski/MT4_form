(function( $ ) {
 
        var $pick = $('.dynamicform');
		var $form = $('.mt4form');
		console.log($pick.children().children('.entrywidth').children('.wp-picker-container').children('span').children('input[id="formbackground"]').val());
		$($test.change(function(){
		console.log('test');
		}));
		$( $pick.children().children('.entrywidth').children('.wp-picker-container').children('span').children('input')).change(function() {
  alert( "Handler for .change() called." );
});
		$form.css({backgroundColor: $pick.children().children('.entrywidth').children('.wp-picker-container').children('span').children('input[id="formbackground"]').val() })
		/*$pick.children().children('.entrywidth').each(function(index){
			if ($(this).children('.wp-picker-container').children('span').children('input.wp-color-picker').val() != '#'){
				alert($(this).children('.wp-picker-container').children('span').children('input.wp-color-picker').val());
			}
		});*/
     
})( jQuery );