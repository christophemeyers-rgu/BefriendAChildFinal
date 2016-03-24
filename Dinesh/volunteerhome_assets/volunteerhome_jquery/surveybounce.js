
$( "#submit1" ).click(function() {
    $( "#cont1" ).toggle( "bounce", 1000 );
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

    $("#summary").html($("Form").serialize());

    var formData = $(this).serialize().split("&");
    console.log("You entered:");

    $.each(formData, function(index, value){
        value = value.split("=");

        // Append to div instead of logging to console
        console.log(value[0] + ": " + value[1]);
    })
    event.preventDefault();
});

$( "#submit7" ).click(function() {
    $( "#cont7" ).toggle( "slide", 1000 );
});


