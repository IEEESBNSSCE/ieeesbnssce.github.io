<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$address = $_POST['address'];

		$from = 'Demo Contact Form'; 
		$to = 'dprakash332@gmail.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body ="Name: $name\n E-Mail: $email\n Address:\n $address\n Number: $number\n";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		// Check if number hasbeen entered is valid
		if (!$_POST['number'] ) {
			$errNumber = 'Please enter a valid phone number';
		}
		
		//Check if message has been entered
		if (!$_POST['address']) {
			$errAddress = 'Please enter your address';
		}
		
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errNumber && !$errAddress) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>