<label for="question5">
    <?php

        get_question_text(41);

    ?>
</label>
<input hidden type="number" name="qid5" value="41">
<input type="radio" name="question5" value=true required>YES
<input type="radio" name="question5" value=false required>NO
<br>
<br>
<label for="question5">Explain :</label>
<br>
<textarea name="question5_opt" cols="45" rows="5" placeholder="Enter items here"></textarea>
<br>
<input type="button" id="submit5" name="submit" value="GO TO QUESTION 6">