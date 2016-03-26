<h3>Question 2
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
<input type="button" id="previous1" name="previous" value="GO TO QUESTION 1">
<input type="button" id="next3" name="next" value="GO TO QUESTION 3">
