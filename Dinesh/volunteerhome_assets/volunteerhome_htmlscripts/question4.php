<div>
    <h2>==========[Question 4]:==============</h2>
    <br>
    <br>
<fieldset>
    <label for="question4">
         <?php
            //function for getting the text
           get_question_text(31);
        ?>
</label>

    <input hidden type="number" name="qid4" value="31"><!-- Hidden input that carries value of question id (currently manual)-->
<br>
    <input required type="radio" name="question4" value="0">Nothing new
    <input required type="radio" name="question4" value="1">Done it before
    <input required type="radio" name="question4" value="2">Never done it before
<br>
<br>
    <label for="question4">Explain :</label>
<br>
    <textarea name="question4_opt" cols="45" rows="5" placeholder="Explain what you learned here"></textarea>
<br>
<br>
</fieldset>
</div>
    <input type="button" id="previous3" name="previous" value="GO TO QUESTION 3">
    <input type="button" id="next5" name="next" value="GO TO QUESTION 5">
