<h3>
<label for="question2">
    <?php
    //function for getting the text
    get_question_text(11);
    ?>
</label>

<br>
<input hidden type="number" name="qid2" value="11"><!-- Hidden input that carries value of question id (currently manual)-->
<input required type="number" step="any" name="question2" placeholder="Enter Amount in £">
<br>
</h3>
<input type="button" id="submit2" name="submit" value="GO TO QUESTION 3">