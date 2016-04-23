<div>
    <br>
    <br>
<fieldset>
    <h3>
    <label for="question4">
        <?php
            //function for getting the text
           get_question_text(31);
        ?> (Required)
</label>

    <input hidden type="number" name="qid4" value="31"><!-- Hidden input that carries value of question id (currently manual)-->
<br>
    <input required type="radio" name="question4" value="Nothing new" id="question4">Nothing new
    <input required type="radio" name="question4" value="Done it before" id="question4">Done it before
    <input required type="radio" name="question4" value="Never done it before" id="question4">Never done it before
<br>
<br>
    <label for="question4">Explain :(Optional)</label>
<br>
    <textarea name="question4_opt" cols="45" rows="5" placeholder="Explain what you learned here"></textarea>
<br>
<br>
    </h3>
</fieldset>
</div>
<h5>
    <a href="#bar3"><input class="navbuttonprevious"" type="button" id="previous3" name="previous"></a>
    <a href="#bar5"><input class="navbuttonnext" type="button" id="next5" name="next"></a>
</h5>