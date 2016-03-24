<label for="question3">
    <?php
        get_question_text(21);
    ?>
</label>
<input required type="radio" name="question3" value="0"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsad.png" alt="sad">
<input required type="radio" name="question3" value="1"><img src="volunteerhome_assets/volunteerhome_images/surveyiconnomal.png" alt="normal">
<input required type="radio" name="question3" value="2"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsmile.png" alt="smile">
<br>
<br>
<input hidden type="number" name="qid3" value="21">
<label for="question3">Explain :</label>
<br>
<textarea name="question3_opt" cols="45" rows="5" placeholder="Enter your explanation here"></textarea>
<br>
<input type="button" id="submit3" name="submit" value="GO TO QUESTION 4">