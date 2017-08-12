<?php
//if(!isset($_SESSION['mail']))
//{
//header("location:index.php");
//}
if(isset($_POST['submitted']))
{
if($_POST && isset($_FILES['my_file']))
{
	$_SESSION['email']=$_POST['email'];
	$b=$_SESSION['email'];
    $from_email         = $b; //from mail, it is mandatory with some hosts
    $recipient_email    = 'shalini.jaiswalsj09@gmail.com'; //recipient email (most cases it is your personal email)
    
    //Capture POST data from HTML form and Sanitize them, 
    $sender_name    = filter_var($_POST["name"], FILTER_SANITIZE_STRING); 
    $reply_to_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); 
    $subject        = filter_var($_POST["subject"], FILTER_SANITIZE_STRING); 
    $message        = filter_var($_POST["message"], FILTER_SANITIZE_STRING); 

    //Get uploaded file data
    $file_tmp_name    = $_FILES['my_file']['tmp_name'];
    $file_name        = $_FILES['my_file']['name'];
    $file_size        = $_FILES['my_file']['size'];
    $file_type        = $_FILES['my_file']['type'];
    $file_error       = $_FILES['my_file']['error'];

    if($file_error > 0)
    {
        die('Upload error or No files uploaded');
    }
    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));
}
        $boundary = md5("sanwebe");
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from_email."\r\n"; 
        $headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 
    $sentMail = @mail($recipient_email, $subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {       
        echo("<script>alert('Your Mail is Sent Successfuly.........')</script>");
		echo("<script>window.location = 'index.php';</script>");
    	
    }else{
    	echo("<script>alert('Could not send mail!.........')</script>");
		echo("<script>window.location = 'index.php';</script>");
        
    }
}
else {
	echo("<script>window.location = 'index.php';</script>");
}
?>