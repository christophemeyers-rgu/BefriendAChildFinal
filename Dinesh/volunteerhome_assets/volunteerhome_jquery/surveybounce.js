

//================================================== Next buttons


$( "#next2" ).click(function() {
    $( "#cont1" ).toggle( "explode", 1000 );

    $( "#progressbar" ).progressbar({
        value: 12.5
    });
});

$( "#next3" ).click(function() {
    $( "#cont2" ).toggle( "size", 1000 );
});

$( "#next4" ).click(function() {
    $( "#cont3" ).toggle( "fold", 1000 );
});

$( "#next5" ).click(function() {
    $( "#cont4" ).toggle( "puff", 1000 );
});

$( "#next6" ).click(function() {
    $( "#cont5" ).toggle( "clip", 1000 );
});

$( "#nextsurveysummary" ).click(function() {
    $( "#cont6" ).toggle( "scale", 1000 );

    $( "div" ).show().prependTo( "p" ); // sends all the questions summary to the summary page
});

$( "#nextsubmitsurvey" ).click(function() {
    $( "#cont7" ).toggle( "fade", 1000 );
});


//================================================== Previous buttons


$( "#previous1" ).click(function() {
    $("#cont1").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 0
    });
});

$( "#previous2" ).click(function() {
    $("#cont2").toggle("slide", 1000);
});

$( "#previous3" ).click(function() {
    $("#cont3").toggle("slide", 1000);
});

$( "#previous4" ).click(function() {
    $("#cont4").toggle("slide", 1000);
});

$( "#previous5" ).click(function() {
    $("#cont5").toggle("slide", 1000);
});


$( "#previoussurveysummary" ).click(function() {
    $("#cont7").toggle("slide", 1000);
});