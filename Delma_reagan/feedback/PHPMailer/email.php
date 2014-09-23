<?php
require 'PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'delma.delusa@gmail.com';                   // SMTP username
$mail->Password = 'zinnia11';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('delma.delusa@gmail.com', 'Delaware Malayali');     //Set who the message is to be sent from
$mail->addReplyTo('info@delma.org', 'Info Delma');  //Set an alternative reply-to address
$mail->addAddress('communications@delma.org', 'Communications Delma'); 
#$mail->addAddress('saba83rish@gmail.com', 'Sabarish Chandrasekharan'); 
 // Add a recipient
#$mail->addAddress('ellen@example.com');               // Name is optional
#$mail->addCC('cc@example.com');
#$mail->addBCC('bcc@example.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
#$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
#$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

// prepare email body text
$Body = "";
$Body .= "</br>";
$Body .= "Email sent from feedback form";
$Body .= "</br>";
$Body .= "Name: ";
$Body .= $_POST['Name'];
$Body .= "</br>";
$Body .= "Mailing Address: ";
$Body .= $_POST['City'];
$Body .= "</br>";
$Body .= "Tel: ";
$Body .= $_POST['Tel'];
$Body .= "</br>";
$Body .= "Email: ";
$Body .= $_POST['Email'];
$Body .= "</br>";
$Body .= "Message: ";
$Body .= $_POST['Message'];
$Body .= "</br>";

// send email 
//wont work in a vendor smtp
#$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
 
$mail->Subject = 'Email sent from feedback form (www.delma.org)';
$mail->Body    = $Body;
$mail->AltBody = $Body;
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
#$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
} else {

	print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
#echo 'Message has been sent';

