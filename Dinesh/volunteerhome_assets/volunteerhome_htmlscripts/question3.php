<h2>
    <h3>==========[Question 6]:==============</h3>
    <br>
    <br>
<label for="question3">
    <?php
    //function for getting the text
    get_question_text(21);
    ?>
</label>

<input hidden type="number" name="qid3" value="21"><!-- Hidden input that carries value of question id (currently manual)-->
<br>
<input required type="radio" name="question3" value="0"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsad.png" alt="sad">
<input required type="radio" name="question3" value="1"><img src="volunteerhome_assets/volunteerhome_images/surveyiconnomal.png" alt="normal">
<input required type="radio" name="question3" value="2"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsmile.png" alt="smile">
<br>
<br>
<label for="question3">Explain :</label>
<br>
<textarea name="question3_opt" cols="45" rows="5" placeholder="Enter your explanation here"></textarea>
<br>
<br>
</h2>
<input type="button" id="previous2" name="previous" value="GO TO QUESTION 2">
<input type="button" id="next4" name="next" value="GO TO QUESTION 4">
