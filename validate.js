function aws(form)
{
    var r7 = document.forms["mailtome"]["name"].value;
    if (r7 == "") {
        alert("Please Enter Your Name");
        return false;
    }
    var r8 = document.forms["mailtome"]["email"].value;
    if (r8== "") {
        alert("Please Enter Emai Address");
        return false;
    }
    var r5 = document.forms["mailtome"]["message"].value;
    if (r5 == "") {
        alert("Please Enter Number the message you want to send ");
        return false;
    }
}