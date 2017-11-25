<?php include('form_process.php'); ?>
<?php

 if (isset($_POST['house'])) {
  	$house = ($_POST["house"]);
  }
  else {
  $house = "House";  
  }
  if (isset($_POST['year'])) {
  	$year = ($_POST["year"]);
  }
  else {
  $year = "Year";  
  }
  if (isset($_POST['class'])) {
  	$class = ($_POST["class"]);
  }
  else {
  $class = "Class";  
  }
  
?>
<head>
<link rel="stylesheet" href="form.css" type="text/css">
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body id="bodyg">
<ul class="menu" id="menug">
   <li><a href="http://iej.16mb.com/index.html">Gateway to the houses</a></li>
   <li><a href="http://iej.16mb.com/common/calendar.html">Calendar</a></li>
   <li><a href="http://iej.16mb.com/common/activities.html">Inter house activities</a></li>
   <li><a href="http://iej.16mb.com/common/form.php">Contact</a></li>
   <li><a href="https://iejn.smartschool.be/?mek=bz6TtJj4V5D2EhDVIPd3NWq5d5877c44c576e4&smk=0dcfc37f203d5c2fb1b44f43ed25b227">Smartschool</a></li>
</ul>
<div class="container">  
  <form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>Contact</h3>
    <h4>this is only a test version!</h4>
    <fieldset>
      <span class="error"><?= $name_error ?></span>
      <input placeholder="Your name" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
    </fieldset>
    <fieldset>
		<span class="error"><?= $email_error ?></span>      
      <input placeholder="Your Email Address" type="text" name="email" value="<?= $email ?>" tabindex="2">
    </fieldset>
    <fieldset>
      <span class="error"><?= $phone_error ?></span>
      <input placeholder="Your Phone Number" type="text" name="phone" value="<?= $phone ?>" tabindex="3">
    </fieldset>
    <!--<fieldset>
		<span class="error"><?= $url_error ?></span>      
      <input placeholder="Your Web Site starts with http://" type="text" name="url" value="<?= $url ?>" tabindex="4" >
    </fieldset>-->
    <div class="captcha_error"><?= $drop_error ?></div>
    <div class="captcha_error"><?= $dropdown_error ?></div>   
	 <select id="house" name="house" required>
	 <option selected ><?= $house ?></option>  
    <?php
    $hn=array("Narval" => Narval,"Condor" => Condor,"Dole" => Dole,"Irbis" => Irbis,"Markhor" => Markhor);
    foreach($hn as $key => $value):
	 echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
	 endforeach;;
    ?>
    </select>    
    <select id="year" name="year" required>
    <option selected ><?= $year ?></option>
    <?php
    for($i =1;$i<=6;$i++){
		  echo '<option value="'.$i.'">'.$i.'</option>';    
    }
    ?>
    </select>
    <select id="class" name="class" required>
    <option selected ><?= $class ?></option>  
    <?php
    for($c ='A';$c<='I';$c++){
		  echo '<option value="'.$c.'">'.$c.'</option>';    
    }
    ?>
    </select> 
    <fieldset>
      <textarea name="message" tabindex="5">
      <?php echo $message ?>
      </textarea>
    </fieldset>
    <fieldset>
    <div class="g-recaptcha" data-sitekey="6LePAiIUAAAAAJHHJOAOoIlA4ROo2nasQ1QEn91d"></div>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <div class="success"><?= $success ?></div>
    <div class="captcha_error"><?= $captcha_error ?></div>
  </form>
</div>