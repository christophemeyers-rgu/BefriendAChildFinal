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
    $('#idform *').filter(':input').each(function () {

        if (!$('input').val()) {
            alert("Please Enter the Date of Event.");

        }
    });
    return false;
});