

//================================================== Next buttons


$( "#next2" ).click(function() {
    $( "#cont1" ).toggle( "explode", 1000 );

    $( "#progressbar" ).progressbar({
        value: 17
    });

    $("#progressbarprogress").progressLabel.text( "Question 2 out of 6" );

});

$( "#next3" ).click(function() {
    $( "#cont2" ).toggle( "size", 1000 );

    $( "#progressbar" ).progressbar({
        value: 34
    });
});

$( "#next4" ).click(function() {
    $( "#cont3" ).toggle( "fold", 1000 );

    $( "#progressbar" ).progressbar({
        value: 51
    });
});

$( "#next5" ).click(function() {
    $( "#cont4" ).toggle( "puff", 1000 );

    $( "#progressbar" ).progressbar({
        value: 68
    });
});

$( "#next6" ).click(function() {
    $( "#cont5" ).toggle( "clip", 1000 );

    $( "#progressbar" ).progressbar({
        value: 85
    });
});

$( "#nextsurveysummary" ).click(function() {
    $( "#cont6" ).toggle( "scale", 1000 );

    $( "div" ).show().prependTo( "p" ); // Sends all the questions summary to the summary page

    $( "#progressbar" ).progressbar({
        value: 100
    });
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

    $( "#progressbar" ).progressbar({
        value: 17
    });
});

$( "#previous3" ).click(function() {
    $("#cont3").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 34
    });
});

$( "#previous4" ).click(function() {
    $("#cont4").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 51
    });
});

$( "#previous5" ).click(function() {
    $("#cont5").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 68
    });
});