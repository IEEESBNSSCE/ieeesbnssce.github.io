<html>
<head>

		<link rel="stylesheet" href="form/css/main.css" />
		<link rel="shortcut icon" href="form/favicon.png">
  <style>
            body{
                background:#0012B0;
            }
            .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
        </style>
<title>Response</title>
</head>
  
  
<?php


$name = $_POST["name"];
$email = $_POST["email"];
$mob = $_POST["mob"];
$year = $_POST["year"];
$branch = $_POST["branch"];
$dob = $_POST["dob"];
$mess = $_POST["message"];
$pincode = $_POST["pincode"];
$gender = $_POST["gender"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'form/PHPMailer/src/Exception.php';
require 'form/PHPMailer/src/PHPMailer.php';
require 'form/PHPMailer/src/SMTP.php';


$mail = new PHPMailer;
                             
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "noreply.ieeesbnssce@gmail.com";                 
$mail->Password = "nssieee123!@#";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;    
$mail->From = "noreply.ieeesbnssce@gmail.com";
$mail->FromName = "New Request To Join";
$mail->AddCC("sarathsksofficial@gmail.com", "Sarath");
$mail->AddCC("anju2298@gmail.com", "Anjana");
$mail->AddCC("aparnaanil2209@gmail.com","Aparna");
$mail->addAddress("ieeesbnssce@gmail.com", "IEEE SB NSSCE");

$mail->isHTML(true);

$message = file_get_contents('form/EmailTemplate.html');
$message = str_replace('%% namea %%', $name, $message);
$message = str_replace('%% emaila %%', $email, $message);
$message = str_replace('%% brancha %%', $branch, $message);
$message = str_replace('%% yeara %%', $year, $message);
$message = str_replace('%% mobilea %%', $mob, $message);
$message = str_replace('%% doba %%', $dob, $message);
$message = str_replace('%% addressa %%', $mess, $message);
$message = str_replace('%% gendera %%', $gender, $message);
$message = str_replace('%% pincodea %%', $pincode, $message);
$mail->msgHTML($message);

$mail->Subject = "New Join Request";
$mail->AltBody = "".$name." from ".$branch." of ".$year." like to join IEEE SB NSSCE <br>Gender: ".$gender."<br>Mobile: ".$mob."<br>Email: ".$email."<br>DOB: ".$dob."<br>Address: ".$mess
."<br>Pincode: ".$pincode;
/*
if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
if($mail->send()){
header('Location: index.html');
}
*/
?>




<img src="form/a.png" alt="iEDC" style="width:auto;height:auto;" class = "center">
<form action="index.html" method=post class="form-box">
<div class="form-group col-md-12"  align=center>
		<input type="submit"  value="Home Page" >
	</div>
</form>
</body>
</html>