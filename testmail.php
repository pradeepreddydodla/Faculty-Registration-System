<?php
$to='dharaneeshpkn@gmail.com';
$subject='Fall Semester Course Registration confirmation';
$message='Greetings From SITE School, VIT university,
          testting: 
		  Theory :';
$headers='From: sitevitsjt@gmail.com' . "\r\n" .
          'Reply-To: sitevitsjt@gmail.com' . "\r\n" .
		  'MIME-Version: 1.0'. "\r\n" .
		  'Content-type: text/plain; charset=iso-8859-1; name=Course_Registered' . "\r\n".
		  'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers))
 echo 'success';
else
 echo '<script type="text/javascript">window.location.href="mailfail.html";</script>';
?>