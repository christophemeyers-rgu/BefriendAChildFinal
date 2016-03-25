<label for="question6">
    <?php
        //function for getting the text
        get_question_text(51);

    ?>
</label>
<div>
<input hidden type="number" name="qid6" value="51"><!-- Hidden input that carries value of question id (currently manual)-->
<input required type="radio" name="question6" value=true>YES
<input required type="radio" name="question6" value=false>NO
<br>
<br>
<label for="question6">Explain :</label>
<br>
<textarea name="question6_opt" cols="45" rows="5" placeholder="Explain why here"></textarea>
<br>
</div>
<input type="button" id="submit6" name="submit" value="GO TO SURVEY SUMMARY">