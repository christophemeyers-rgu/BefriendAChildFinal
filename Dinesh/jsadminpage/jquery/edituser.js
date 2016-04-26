$('#yes').is(':checked')(function () {
    //check if radio button is checked
    if ($('#yes').is(':checked')) {

        $('.disabledelements').removeAttr('disabled'); //enable input
        $("#childinfo").show();
    }
});

$('#no').click(function () {
    //check if checkbox is checked
    if ($('#no').is(':checked')) {

        $('.disabledelements').attr('disabled', true); //disable input
        $("#childinfo").hide();
    }
});