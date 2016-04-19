
//============================================================ Next buttons


$( "#start" ).click(function() {
    if (Modernizr.formvalidation) {

        if ($('#eventdate')[0].checkValidity()) {
            $("#welcomepage").toggle("fade", 1000);
            $("#surveybar").toggle("fade", 1000);
            $("#cont1").toggle("explode", 1000);
        }else {
        $("#surveyform").find(':submit').click()
    }
}else {

        //If required attribute is not supported or browser is Safari (Safari thinks that it has this attribute, but it does not work), then check all fields that has required attribute
        if (!$(this).val()) {
            //If at least one required value is empty, then ask to fill all required fields.
            alert("Please fill all required fields.");
            return false;
        }
    }
});

$( "#next2" ).click(function() {
    if($('#question1')[0].checkValidity()) {
        $("#cont1").toggle("explode", 1000);
        $("#cont2").toggle("size", 1000);
        $("#progressbar").progressbar({
            value: 17
        });
    }else {
        $( "#surveyform" ).find(':submit').click()
    }
});

$( "#next3" ).click(function() {
    if($('#question2')[0].checkValidity()) {
    $( "#cont2" ).toggle( "size", 1000 );
    $( "#cont3" ).toggle( "fold", 1000 );
    $( "#progressbar" ).progressbar({
            value: 34
        });
    }else {
        $( "#surveyform" ).find(':submit').click()
    }
});

$( "#next4" ).click(function() {
    if($('#question3')[0].checkValidity()) {
    $( "#cont3" ).toggle( "fold", 1000 );
    $( "#cont4" ).toggle( "puff", 1000 );
    $( "#progressbar" ).progressbar({
            value: 51
        });
    }else {
        $( "#surveyform" ).find(':submit').click()
    }
});

$( "#next5" ).click(function() {
    if($('#question4')[0].checkValidity()) {
    $( "#cont4" ).toggle( "puff", 1000 );
    $( "#cont5" ).toggle( "clip", 1000 );
    $( "#progressbar" ).progressbar({
            value: 68
        });
    }else {
        $( "#surveyform" ).find(':submit').click()
    }
});

$( "#next6" ).click(function() {
    if($('#question5')[0].checkValidity()) {
    $( "#cont5" ).toggle( "clip", 1000 );
    $( "#cont6" ).toggle( "puff", 1000 );
    $( "#progressbar" ).progressbar({
            value: 85
        });
    }else {
        $( "#surveyform" ).find(':submit').click()
    }
});

$( "#nextsurveysummary" ).click(function() {
    if($('#question6')[0].checkValidity()) {
    $( "#cont6" ).toggle( "fade", 1000 );
    $( "#cont7" ).toggle( "fade", 1000 );
    $( "div" ).show().prependTo( "p" ); // Sends all the questions summary to the summary page

    $( "#progressbar" ).progressbar({
            value: 100
        });
    }else {
        $( "#surveyform" ).find(':submit').click()
    }
});


//============================================================ Previous buttons


$( "#previous1" ).click(function() {
    $("#cont2").toggle("slide", 1000);
    $("#cont1").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 0
    });
});

$( "#previous2" ).click(function() {
    $("#cont3").toggle("slide", 1000);
    $("#cont2").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 17
    });
});

$( "#previous3" ).click(function() {
    $("#cont4").toggle("slide", 1000);
    $("#cont3").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 34
    });
});

$( "#previous4" ).click(function() {
    $("#cont5").toggle("slide", 1000);
    $("#cont4").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 51
    });
});

$( "#previous5" ).click(function() {
    $("#cont6").toggle( "slide", 1000 );
    $("#cont5").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 68
    });
});


//============================================================ Progress BAR


$(function() {
    var progressbar = $( "#progressbar" ),
        progressLabel = $( ".progress-label" );

    progressbar.progressbar({
        value: false,
        change: function() {
            progressLabel.text( progressbar.progressbar( "value" ) + "%" );
        },
        complete: function() {
            progressLabel.text( "Check Answers and Click Submit to Complete!" );
        }
    });

    $( "#progressbar" ).progressbar({
        value: 0
    });
});
