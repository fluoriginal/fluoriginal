<?php 

// define variables and set to empty values
$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $phone = $message = $url = $success = "";
//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["phone"])) {
    $phone_error = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phone_error = "Invalid phone number"; 
    }
  }

  if (empty($_POST["url"])) {
    $url_error = "";
  } else {
    $url = test_input($_POST["url"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $url_error = "Invalid URL"; 
    }
  }
  
  $house = ($_POST["house"]);
  $year = ($_POST["year"]);
  $class = ($_POST["class"]);
  
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
  
 if (isset($_POST['submit'])) {
    $secret = '6LePAiIUAAAAAH7VXCu-NwkxdSrOle6ptKlAvK7s';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
    $result = json_decode($url, TRUE);
    if ($result['success'] == 1) {
    	 unset($_POST['g-recaptcha-response']);
       if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '' ){
      if($house!= 'House' and $year!= 'Year' and $class!= 'Class' ) {
               
            
      $message_body = '';
      $_POST['remoteip'] = $remoteip;
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
      $to = 'contacthousesiejn@gmail.com';
      $subject = 'Contact Form Submit';
      $from = 'iejnhouses@gmail.com';
      $headers = "From: $from\r\nReply-to: $email";
      $sent = mail($to, $subject, $message_body, $headers);
   }
      if ($sent){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $phone = $message = $url = '';
      }
       else {
    $drop_error= "Please select a value in each dropdown menu";   
   } 
  }
  
}
else {
	$captcha_error = "Please check the captcha(I'm not a robot box)";
}
 
    }
 }
  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}