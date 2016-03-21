$(document).ready(function(){


    $("#submit").click(function() {
        var input = $("input").val();
        var textarea = $("input").val();


        // AJAX Code To Submit Form.
        $.ajax({
            type: "POST",
            url: "ajaxsubmit.php",
            data: dataString,
            cache: false,
            success: function (result) {
                alert(result);
            }
        });

    });
});