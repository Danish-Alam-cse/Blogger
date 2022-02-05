<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="./css/contact.css">
</head>
<body>
<section>
    <div class="container">
      <form action="https://formspree.io/mbjzbwaj" method="POST" id="my-form">
  
        <div class="form-group">
          <label for="firstName"> First Name</label>
          <input type="text" id="firstName" name="firstName">
        </div>
  
        <div class="form-group">
          <label for="latsName">Last Name</label>
          <input type="text" id="lastName" name="lastName">
        </div>
  
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email">
        </div>
  
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </div>
  
        <button type="submit">Submit</button>
      </form>
    </div>
    <div id="status"></div>
  </section>
</body>
</html>

<?php
$to_email = "danishalam0022gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: danishalam0022gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}