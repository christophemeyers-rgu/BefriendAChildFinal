<label for="question6">
    <?php

        get_question_text(51);

    ?>
</label>
<input hidden type="number" name="qid6" value="51">
<input type="radio" name="question6" value=true required>YES
<input type="radio" name="question6" value=false required>NO
<br>
<br>
<label for="question6">Explain :</label>
<br>
<textarea name="question6_opt" cols="45" rows="5" placeholder="Explain why here"></textarea>
<br>
<input type="button" id="submit6" name="submit" value="GO TO SUBMIT SURVEY">