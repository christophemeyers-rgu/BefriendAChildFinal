<h3>
<label for="question1">
    <?php
        //function for getting the text
        get_question_text(1);
    ?>
</label>

<br>
<input hidden type="number" name="qid1" value="1"><!-- Hidden input that carries value of question id (currently manual)-->
<textarea required name="question1" cols="45" rows="5" placeholder="Enter your response here"></textarea>
<br>
</h3>
<input type="button" id="submit1" name="submit" value="GO TO QUESTION 2">