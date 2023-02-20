for mail function
1)unzip from sendmail and store it in wamp
2)open the sendmail.ini file in it and paste the following code

[sendmail]
smtp_server=smtp.gmail.com
smtp_port=465
smtp_ssl=ssl
default_domain=localhost
error_logfile=error.log
;debug_logfile=debug.log
auth_username=someemail@gmail.com
auth_password=somepassword
pop3_server=
pop3_username=
pop3_password=
force_sender=someemail@gmail.com
force_recipient=
hostname=localhost

3)open wamp\bin\apache\apache2.4.9\bin\php.ini

4)find mail func in it and edit 
smtp_port = 25
sendmail_path = "C:\wamp\sendmail\sendmail.exe -t -i"
SMTP = localhost

5)open wamp\bin\php\php5.5.12\php.ini

6)repeat the same process as step 4 

7)start wamp services and select apache->apache modules-> select ssl modules.

8)open wamp and select php->php extensions->select php_openssl and php_sockets

9) restart the wamp services 

10)goto this link from the mail which u wanna use(dummy mail) -> https://www.google.com/settings/security/lesssecureapps

11) turn on the service and update it 

12)goto wamp\sendmail->right click sendmail.exe->properties->compatibilty->Change the configuration for all users->Execute as Windows XP Service Pack 3->Execute as Windows XP SP 3->save 

13)create a email.php
<?php
$to='someadmin@gmail.com';
$subject='testing';
$message='hi working';
$headers='From: someemail@gmail.com' . "\r\n" .
          'Reply-To: someemail@gmail.com' . "\r\n" .
		  'MIME-Version: 1.0'. "\r\n" .
		  'Content-type: text/html: charset=iso-8859-1' . "\r\n".
		  'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers))
 echo "email sent";
else
 echo "failed";
?>

and run 
