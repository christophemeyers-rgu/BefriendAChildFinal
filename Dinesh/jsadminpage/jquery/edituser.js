 if ($('#yes').is(':checked')) {

        $('.disabledelements').removeAttr('disabled'); //enable input
        $("#childinfo").show();
    }else {
        if ($('#no').is(':checked')) {

            $('.disabledelements').attr('disabled', true); //disable input
            $("#childinfo").hide();
        }
    }

