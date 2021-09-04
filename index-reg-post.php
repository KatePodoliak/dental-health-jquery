<?php
    $PAGE_TITLE = "Регистрация";
    $PAGE_JS = Array();  
    include "include/header.php";
?>
            <div id="title-reg">Registration</div>
            <form id="reg-form" name="registration" method="post" action="index-reg-post.php">
                <label id="name-label">
                    Name:
                    <input type="text" name="username" id="input-name" title="Only letters.">
                    <span class="error"></span>
                </label>
                <label id="radio-label" class="reg-elements">
                    Gender:
                    <input type="radio" id="sex-man" name="gender" value="man">
                    <label for="sex-man">male</label>
                    <input type="radio" id="sex-woman" name="gender" value="woman">
                    <label for="sex-woman">female</label>
                    <span class="error"></span>
                </label>
                <label id="date-label" class="reg-elements">
                    Birth date:
                    <input type="text" id="day" class="data" size="2" placeholder="DD" title="Only number.">
                    <input type="text" id="month" class="data" size="2" placeholder="ММ" title="Only number.">
                    <input type="text" id="year" class="data" id="input-year" size="4" placeholder="YYYY" title="Only number.">
                    <span class="error"></span>
                </label>
                <div id="list-check" class="reg-elements">
                    <label id="interests-label">Your interests:
                        <span class="error"></span>
                    </label>
                    <p><input type="checkbox" name="interest" value="Programming"> Programming</p>
                    <p><input type="checkbox" name="interest" value="Dancing"> Dancing</p>
                    <p><input type="checkbox" name="interest" value="Reading"> Reading</p>
                    <p><input type="checkbox" name="interest" value="Singing"> Singing</p>
                    <p><input type="checkbox" name="interest" value="Travelling"> Travelling</p>
                    <p><input type="checkbox" name="interest" value="Painting"> Painting</p>
                    <p><input type="checkbox" name="interest" value="Cooking"> Cooking</p>
                    <p><input type="checkbox" name="interest" value="Gardening"> Gardening</p>
                    <p><input type="checkbox" name="interest" value="Fishing"> Fishing</p>
                    <p><input type="checkbox" name="interest" value="Hiking"> Hiking</p>
                    <p><input type="checkbox" name="interest" value="Cycling"> Cycling</p>
                    <a href="" id="select-all" class="link-check">Select all</a>
                    <a href="" id="invert-all" class="link-check">Invert</a>
                    <a href="" id="remove-all" class="link-check">Remove all</a>
                </div>  
                <input type="submit" class="reg-button" name="reg-ok" value="Register">
            </form>
<script>
    function validateName(name) {
        var reg = /^[a-zа-яё]+$/i;
        if (reg.test(name)) {        
            $("#name-label span").empty();
            $("#input-name").css("border", "");
            return true;
        } 
        else{
            $("#name-label span").text("Incorrect name.");
            $("#input-name").css("border", "1px solid red");
        }
    }

    function validateDate(day, month, year) {
        var regD = /^([0-2]\d|3[01])$/;
        var regM = /^(0[1-9]|1[012])$/;
        var regY = /^\d{4}$/;
        var now = new Date();
        $("#day").css("border", "");
        $("#year").css("border", "");
        $("#month").css("border", "");
        if (!regD.test(day)){
            $("#day").css("border", "1px solid red");
            $("#date-label span").text("Incorrect date value.");
        }
        else if(!regM.test(month)){
            $("#month").css("border", "1px solid red");
            $("#date-label span").text("Incorrect date value.");
        }
        else if(year > now.getFullYear() || !regY.test(year)){
            $("#year").css("border", "1px solid red");
            $("#date-label span").text("Incorrect date value.");
        }
        else{
            $("#date-label span").empty();
            return true;
        }
    }

    function validateGender(day, month, year) {
        var now = new Date();
        var age = now.getFullYear() - year - ((now.getMonth() - --month || now.getDate() - day) < 0);
        if ($('input[name="gender"]').is(':checked')){
            var value = $('input[name="gender"]:checked').val();
            if (age < 21 && value == "man"){
                $("#radio-label span").text("Age of the man must be over 21.");
                $('input[name="gender"]:checked').next().css("color", "red");
            } 
            else if (age < 18 && value == "woman"){
                $("#radio-label span").text("Age of the woman must be over 18.");
                $('input[name="gender"]:checked').next().css("color", "red");
            } 
            else{
                $("#radio-label span").empty();
                $('input[name="gender"]').next().css("color", "");
                return true;
            }
        }
        else{
            $("#radio-label span").text("Select gender.");
            $('input[name="gender"]').next().css("color", "red");
        }
    }

    function validateInterests()
    {
        if($('input[type=checkbox]').is(':checked')==true){
            $("#interests-label span").empty();
            return true;
        }
        {
            $("#interests-label span").text("Select interest.");
        }
    }

    $(document).ready(function() {
        $("#select-all").click(function (e) {
            e.preventDefault();
            $(this).parents('#list-check').find("input[type=checkbox]").each(function() {
                this.checked = true; 
            });
        }); 
        $("#invert-all").click(function (e) {
            e.preventDefault();
            $(this).parents('#list-check').find("input[type=checkbox]").each(function() {
                this.checked = $(this).is(':checked')?false:true;
          });
        }); 
        $("#remove-all").click(function (e) {
            e.preventDefault();
            $(this).parents('#list-check').find("input[type=checkbox]").each(function() {
                this.checked = false; 
            });
        }); 
        $('#reg-form').submit(function(e) {
            e.preventDefault();
            var name = $('#input-name').val();
            var day = $('#day').val();
            var month = $('#month').val();
            var year = $('#year').val();
            if(validateName(name) && validateDate(day, month, year) && validateGender(day, month, year) && validateInterests())
            {
                $("#reg-form" ).hide();
                $(".main-part").append("<p id='reg-complete'>Hello " + name + "! Registration completed successfully!</p>");
            }
        });
    });
</script>
<?php
    include "include/footer.php";
?>