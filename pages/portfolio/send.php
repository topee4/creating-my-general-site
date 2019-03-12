<?php 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
$to = "PS_Sava@mail.ru";
$subject = "Tutorial message";
$body = "this is automated message. Please don't reply to this email. \n\n $message";

mail($to, $subject, $body);

echo "Message Sent! <a href='index.php'>Click here</a> to send another email";

?>