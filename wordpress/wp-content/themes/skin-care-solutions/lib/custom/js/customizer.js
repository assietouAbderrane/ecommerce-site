/* Customizer JS Upsale*/
( function( api ) {

    api.sectionConstructor['upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($){

    // Tygoraphy
	$('#_customize-input-skin_care_solutions_heading_font').change(function(){

		var currentfont = this.value;

		var data = {
            'action': 'skin_care_solutions_customizer_font_weight',
            'currentfont': currentfont,
            '_wpnonce': skin_care_solutions_customizer.ajax_nonce,
        };
 
        $.post( ajaxurl, data, function(response) {

            if( response ){

                $('#_customize-input-skin_care_solutions_heading_weight').empty();
                $('#_customize-input-skin_care_solutions_heading_weight').html(response);

            }

        });

	});	

	// Archive Layout Image Control
    $('.radio-image-buttenset').each(function(){
        
        id = $(this).attr('id');
        $( '[id='+id+']' ).buttonset();
    });

});