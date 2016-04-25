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

            if (!$('#firstname').val()){
                alert("Please Enter the Date of Event.");
            }else{
                $("#idform").find(':submit').click()
            }

    });