<!DOCTYPE html>

<html lang="en">

<!-- [START OF HEAD] --------------------------------------------------------------------------------------------->
<head>
    <!-- CHARACTER ENCODING -->
    <meta charset="UTF-8">

    <!-- WINDOW TAB TITLE -->
    <title>Volunteer Homepage</title>

    <!-- WINDOW TAB ICON -->
    <link rel="shortcut icon" href="volunteerhome_assets/volunteerhome_images/tabicon.png" type="image/x-icon" />

    <!-- CSS Stylesheet-->
    <link rel="stylesheet" href="volunteerhome_assets/volunteerhome_css/volunteerhome.css" type="text/css">

    <!-- JQUERY SCRIPT-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<!-- [END OF HEAD] ----------------------------------------------------------------------------------------------->


<!-- [START OF BODY] --------------------------------------------------------------------------------------------->
<body>

    <!-- (START OF MAIN) ------------------------------------------------------------------->
    <main class="grid-container">

        <form action="volunteerhome.php" >

    <!-- SURVEY SUBMIT BUTTON -->
    <section class="container" id="cont7">
        <input type="submit" value="SUBMIT SURVEY">
    </section>

    <!-- SURVEY QUESTION 6 -->
    <section class="container" id="cont6">
        <?php include ("volunteerhome_assets/volunteerhome_htmlscripts/question6.html"); ?>
    </section>

    <!-- SURVEY QUESTION 5 -->
    <section class="container" id="cont5">
        <?php include ("volunteerhome_assets/volunteerhome_htmlscripts/question5.html"); ?>
    </section>

    <!-- SURVEY QUESTION 4 -->
    <section class="container" id="cont4">
        <?php include ("volunteerhome_assets/volunteerhome_htmlscripts/question4.html"); ?>
    </section>

    <!-- SURVEY QUESTION 3 -->
    <section class="container" id="cont3">
        <?php include ("volunteerhome_assets/volunteerhome_htmlscripts/question3.html"); ?>
    </section>

    <!-- SURVEY QUESTION 2 -->
    <section class="container" id="cont2">
        <?php include ("volunteerhome_assets/volunteerhome_htmlscripts/question2.html"); ?>
    </section>

    <!-- SURVEY QUESTION 1 -->
    <section class="container" id="cont1">
        <?php include ("volunteerhome_assets/volunteerhome_htmlscripts/question1.html"); ?>
    </section>

        </form>

    <!-- CALL JQUERY SCRIPT FUNCTION-->
    <script SRC="volunteerhome_assets/volunteerhome_jquery/surveybounce.js"></script>


    </main>
    <!-- (END OF MAIN) ------------------------------------------------------------------->

</body>
<!-- [END OF BODY] --------------------------------------------------------------------------------------------->

</html>