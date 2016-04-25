<div class="summaryquestions">
    <div class="questiontitle">==========[Question 1]:==============</div>
    <br>
    <br>
<fieldset>
    <h3>
    <label for="question1">
        <?php
            //function for getting the text
             get_question_text(1);
        ?> (Required)
</label>
<br>
    <input hidden type="number" name="qid1" value="1"><!-- Hidden input that carries value of question id (currently manual)-->
    <textarea required name="question1" cols="45" rows="5" placeholder="Enter your response here" id="question1"></textarea>
<br>
<br>
    </h3>
</fieldset>
</div>
<div class="surveynavbuttons">
    <input class="navbuttonnext" type="button" id="next2" name="next">
</div>