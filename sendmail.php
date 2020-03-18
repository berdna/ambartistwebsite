<?php
if($_REQUEST['xAction'] == 'sendMail'){
	require("class.phpmailer.inc.php");
	$mail = new PHPMailer();						
	$mail->From = trim($_REQUEST['emailID']);
	$mail->FromName = trim($_REQUEST['fullName']);
	$mail->AddAddress('info@ambartists.com');
	$mail->Subject = "Inquiry from website";
	$mail->Body = '
	<p><strong>Name</strong>: '.$_REQUEST['fullName'].'<br /></p>
	<p><strong>Email</strong>: '.$_REQUEST['emailID'].'<br /></p>
	<p><strong>Link</strong>: '.$_REQUEST['link'].'<br /></p>
	';
	$mail->CharSet = 'UTF-8';
	$mail->ContentType = "text/html";
	
	if($mail->Send()){
		echo 'OK';
	} else {
		echo 'Sorry, Please try again';
	}	
}
?>