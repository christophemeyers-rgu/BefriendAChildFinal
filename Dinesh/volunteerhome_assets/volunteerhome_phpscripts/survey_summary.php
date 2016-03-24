<script>


    $( "#showr" ).click(function() {
        $( "input" ).first().show( "fast", function showNext() {
            $( this ).next( "input" ).show( "fast", showNext );
        });



</script>