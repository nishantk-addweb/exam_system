<script>
$(document).ready(function(e) {

$("input[type='radio']").click(function(){
    var radioValue = $("input[name='yesno']:checked").val();      
    if(radioValue) {   
        $("#radioCheck").val(radioValue);
        console.clear();
        console.log($("#radioCheck").val());
    }
 });
  
})
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="image_radioButton">
<input id="image_radio_check" value="imageButtonChecked" type="radio" class="radio_button" name="yesno" /> Image Radio Button
</div>


<div class="text_radioButton">
<input id="text_radio_check" value="textButtonChecked" type="radio" class="radio_button" name="yesno" />Text Radio Button
</div>

<div class="hidden_input"> 
  <input type="hidden" name="radioCheck" id="radioCheck" value=""/>
</div>
