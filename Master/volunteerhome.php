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

    <!-- SURVEY SUBMIT BUTTON -->
    <section class="container" id="cont7">
        <input type="submit" value="SUBMIT SURVEY">
    </section>

    <!-- SURVEY QUESTION 6 -->
    <section class="container" id="cont6">
        <label for="question6">Would you want to do it again ? :</label>
        <input type="radio" name="question6">YES
        <input type="radio" name="question6">NO
        <br>
        <br>
        <label for="question6">Explain :</label>
        <br>
        <textarea name="question6" cols="45" rows="5" placeholder="Explain why here"></textarea>
        <br>
        <button id="button6">CLICK HERE FOR NEXT QUESTION </button>
    </section>

    <!-- SURVEY QUESTION 5 -->
    <section class="container" id="cont5">
        <label for="question5">Did you eat something healthy ? :</label>
        <input type="radio" name="question5">YES
        <input type="radio" name="question5">NO
        <br>
        <br>
        <label for="question5">Explain :</label>
        <br>
        <textarea name="question5" cols="45" rows="5" placeholder="Enter items here"></textarea>
        <br>
        <button id="button5">CLICK HERE FOR NEXT QUESTION </button>
    </section>

    <!-- SURVEY QUESTION 4 -->
    <section class="container" id="cont4">
        <label for="question4">Did you learn something new ? :</label>
        <input type="radio" name="question4">Nothing new
        <input type="radio" name="question4">Done it before
        <input type="radio" name="question4">Never done it before
        <br>
        <br>
        <label for="question4">Explain :</label>
        <br>
        <textarea name="question4" cols="45" rows="5" placeholder="Explain what you learned here"></textarea>
        <br>
        <button id="button4">CLICK HERE FOR NEXT QUESTION </button>
    </section>

    <!-- SURVEY QUESTION 3 -->
    <section class="container" id="cont3">
        <label for="question3">How much fun did you have today ? :</label>
        <input type="radio" name="question3"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsad.png">
        <input type="radio" name="question3"><img src="volunteerhome_assets/volunteerhome_images/surveyiconnomal.png">
        <input type="radio" name="question3"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsmile.png">
        <br>
        <br>
        <label for="question3">Explain :</label>
        <br>
        <textarea name="question3" cols="45" rows="5" placeholder="Enter your explanation here"></textarea>
        <br>
        <button id="button3">CLICK HERE FOR NEXT QUESTION </button>
    </section>

    <!-- SURVEY QUESTION 2 -->
    <section class="container" id="cont2">
        <label for="question2">How much did you spend today ? :</label>
        <br>
        <input type="number" step="any" name="question2" placeholder="Enter Amount">
        <br>
        <button id="button2">CLICK HERE FOR NEXT QUESTION </button>
    </section>

    <!-- SURVEY QUESTION 1 -->
    <section class="container" id="cont1">
        <label for="question1">What activities did you do today ? :</label>
        <br>
        <textarea name="question1" cols="45" rows="5" placeholder="Enter your response here"></textarea>
        <br>
        <button id="button1">CLICK HERE FOR NEXT QUESTION </button>
    </section>


    <!-- CALL JQUERY SCRIPT FUNCTION-->
    <script SRC="volunteerhome_assets/volunteerhome_jquery/surveybounce.js"></script>


    </main>
    <!-- (END OF MAIN) ------------------------------------------------------------------->

</body>
<!-- [END OF BODY] --------------------------------------------------------------------------------------------->

</html>