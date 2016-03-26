
$( "#next1" ).click(function() {
    $( "#cont1" ).toggle( "explode", 1000 );
});

$( "#next2" ).click(function() {
    $( "#cont2" ).toggle( "size", 1000 );
});

$( "#next3" ).click(function() {
    $( "#cont3" ).toggle( "fold", 1000 );
});

$( "#next4" ).click(function() {
    $( "#cont4" ).toggle( "puff", 1000 );
});

$( "#next5" ).click(function() {
    $( "#cont5" ).toggle( "clip", 1000 );
});

$( "#next6" ).click(function() {
    $( "#cont6" ).toggle( "scale", 1000 );

    $( "h3" ).show().prependTo( "p" ); // sends all the questions summary to the summary page
});

$( "#submit7" ).click(function() {
    $( "#cont7" ).toggle( "slide", 1000 );
});
