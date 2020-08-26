jQuery(document).ready(function($){
    $('select').find('option[value=DESC]').attr('selected','selected');
  });
$(function() {
    var timeCookie = $.cookie( "timeCookie" ),
        selElem = $('select[name=options]');
    selElem.on('change', function() {
        $.cookie( "timeCookie", this.value );
    });
    if( timeCookie != undefined ) {
        selElem.val( timeCookie );
    } else {
        $.cookie( "timeCookie", selElem.val() );
    }
});