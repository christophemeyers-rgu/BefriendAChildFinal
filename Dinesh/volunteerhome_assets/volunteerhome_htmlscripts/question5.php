<h2>
    <h3>==========[Question 6]:==============</h3>
    <br>
    <br>
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
<br>
</h2>
<input type="button" id="previous4" name="previous" value="GO TO QUESTION 4">
<input type="button" id="next6" name="next" value="GO TO QUESTION 6">
