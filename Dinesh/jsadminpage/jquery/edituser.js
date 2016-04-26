 if ($('#yes').is(':checked')) {

        $('.disabledelements').removeAttr('disabled'); //enable input
        $("#childinfo").show();
    }else {
        if ($(this).is(':checked')) {

            $("#childinfo").hide();
        }
    }

