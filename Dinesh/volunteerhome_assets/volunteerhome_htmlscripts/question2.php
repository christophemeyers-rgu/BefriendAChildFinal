<div class="summaryquestions" >
    <div class="questiontitle">==========[Question 2]:==============</div>
    <br>
    <br>
<fieldset>
    <h3>
    <label for="question2">
        <?php
            //function for getting the text
            get_question_text(11);
        ?> (Required)
</label>
<br>
    <input hidden type="number" name="qid2" value="11"><!-- Hidden input that carries value of question id (currently manual)-->
    <input required type="number" step="any" name="question2" placeholder="Enter Amount in £" id="question2">
<br>
<br>
    </h3>
</fieldset>
</div>
<div class="surveynavbuttons">
    <input class="navbuttonprevious"" type="button" id="previous1" name="previous">
    <input class="navbuttonnext" type="button" id="next3" name="next"></a>
</div>