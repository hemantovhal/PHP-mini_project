<?php
$to_email = 'hemantovhal31093@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: hemantovhal31093@gmail.com';
mail($to_email,$subject,$message,$headers);
?>