<label for="question4">
    <?php

        get_question_text(31);

    ?>
</label>
<input required type="radio" name="question4" value="0">Nothing new
<input required type="radio" name="question4" value="1">Done it before
<input required type="radio" name="question4" value="2">Never done it before
<br>
<br>
<input hidden type="number" name="qid4" value="31">
<label for="question4">Explain :</label>
<br>
<textarea name="question4_opt" cols="45" rows="5" placeholder="Explain what you learned here"></textarea>
<br>
<input type="button" id="submit4" name="submit" value="GO TO QUESTION 5">