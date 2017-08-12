<?php 
session_start();
?>

<html>
<head>
  <link rel="stylesheet" href="mailcss.css">
  <script src="validate.js"></script>
</head>
    <div class="outer">
        <img src="1.jpg" id="bg" >              
            <div class="overlay">
               <h1 class="text1">MailService</h1> 
                <form enctype="multipart/form-data" method="post" class="text" action="mail.php" name="mailtome" onsubmit="return aws(this);">
<fieldset > 
<legend >Contact Form</legend>
<div class="fi">
<label for="name">Name</label><br>
<input name="name" type="text" size="40" maxlength="60" id="name" value="" autocomplete="off"><br>
</div>
<div class="fi">
<label for="subject">Subject</label><br>
<input name="subject" type="text" size="40" maxlength="60" id="subject" value="" autocomplete="off"><br>
</div>
<div class="fi">
<label for="email">Email Address</label><br>
<input name="email" type="email" size="40" maxlength="60" id="email" value="" autocomplete="off"><br>
</div>
<div class="fi" style="float: left ;">
<label for="attach" >Attachment :
<input name="my_file" type="file" id="attach" value="Attachment" style="height: 20px; width: 480px">
</label><br>
</div>
<div class="fi">
<label for="comm">Message</label><br>
<textarea name="message" rows="10" cols="50" id="comm"></textarea><br>
</div>
</fieldset>
<div class="fi">
<input type="submit" name="submitted" value="Send" >

</div>
</form>
            </div>
    </div>
</html>

