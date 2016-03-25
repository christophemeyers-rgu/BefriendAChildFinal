<h3>
<label for="question5">
    <?php
        //function for getting the text
        get_question_text(41);

    ?>
</label>

<input hidden type="number" name="qid5" value="41"><!-- Hidden input that carries value of question id (currently manual)-->
<br>
<input required type="radio" name="question5" value=true>YES
<input required type="radio" name="question5" value=false>NO
<br>
<br>
<label for="question5">Explain :</label>
<br>
<textarea name="question5_opt" cols="45" rows="5" placeholder="Enter items here"></textarea>
<br>
</h3>
<input type="button" id="submit5" name="submit" value="GO TO QUESTION 6">