if ($('#no').is(':checked')) {

    $('.disabledelements').attr('disabled', true); //disable input
    $("#childinfo").hide();
}else {
        if ($('#yes').is(':checked')) {

            $("#childinfo").show();

        }else if($('#no').is(':checked')) {

            $("#childinfo").hide();
        }
}