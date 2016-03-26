
$( "#submit1" ).click(function() {
    $( "#cont1" ).toggle( "fade", 1000 );
});

$( "#submit2" ).click(function() {
    $( "#cont2" ).toggle( "size", 1000 );
});

$( "#submit3" ).click(function() {
    $( "#cont3" ).toggle( "fold", 1000 );
});

$( "#submit4" ).click(function() {
    $( "#cont4" ).toggle( "puff", 1000 );
});

$( "#submit5" ).click(function() {
    $( "#cont5" ).toggle( "clip", 1000 );
});

$( "#submit6" ).click(function() {
    $( "#cont6" ).toggle( "scale", 1000 );


        //$("#summary").html($("Form").serialize());

    //$( "input[type=text], input[type=number], input[type=radio], textarea" ).clone().prependTo( "p" );

    $( "h3" ).show().prependTo( "p" );
});

$( "#submit7" ).click(function() {
    $( "#cont7" ).toggle( "slide", 1000 );
});
