$('#yes').click(function () {
    //check if radio button is checked
    if ($(this).is(':checked')) {

        $('.disabledelements').removeAttr('disabled'); //enable input
    }
});

$('#no').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('.disabledelements').attr('disabled', true); //disable input
    }
});



$( "#submit" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
            $("#idform").find(':submit').click()

    }else {
        //If required attribute is not supported by browser then manually check if field is filled

        $('#idform *').filter(':input').each(function(){

            if (!$("input").val()) {
                alert("Please Enter the Date of Event.");
            } else {
                $("#idform").find(':submit').click()
            }

        });
    }
});
