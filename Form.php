<?php

$nameErr = $emailErr = $websiteErr = $educationErr = "";
$name = $email = $education = $comment = $website = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(empty($_POST['name'])){
		$nameErr = "Enter your name";
	}else{ $name = test_input($_POST['name']);
 if(!preg_match("/^(([a-zA-Z' -]{1,30})|([а-яА-ЯЁёІіЇїҐґЄє' -]{1,30}))$/u", $name)){
	$nameErr = "Enter the correct name";
}
}
if(empty($_POST['email'])){
	$emailErr = "Enter email";
}else { $email = test_input($_POST['email']);
if(!filter_var($email, FILTER_VALIDATE_INT)){
	$emailErr = "Incorrect email";
}
}
if(empty($_POST['website'])){
	$websiteErr = "Enter website";
}else{$website = test_input($_POST['website']);
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Некорректный URL";
    }
if(empty($_POST['comment'])){
	$comment="";
}else{ $comment = test_input($_POST['comment']);
}
if(empty($_POST['eduction'])){
	$educationErr = "Choose education";
}else{
	$education = test_input($_POST['education']);
}
}
}
function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form validation</title>
</head>
<body>
<h2>Form validation PHP</h2>
<p><span class="error">*Mandatory fields</span></p>
<form method = "post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	Name:<input type="text" name="name" value="<?php echo $name;?>">
	<span class="error">* <?php echo $nameErr;?></span><br>
	Email:<input type="text" name="email" value="<?php echo $email;?>">
	<span class="error">*<?php echo $emailErr;?></span><br>
	Web site:<input type="text" name="website" value="<?php echo $website;?>">
	<span class="error"><?php echo $websiteErr;?></span><br>
	Commets<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br>
	Education:<input type="radio" name="education" <?php if(isset($education) && $education=="Bachalor") echo "checked";?>value="Bachalor">Bachalor
	<input type="radio" name="education"<?php if(isset($education) && $education=="Colledge") echo "checked";?> value="Colledge">Colledge
	<input type="radio" name="education" <?php if(isset($education) && $education=="Different") echo "checked";?> value="Different">Different
	<span class="error">*<?php echo $educationErr;?></span><br>
	<input type="submit" name="submit" value="Send">
</form>
<?php
echo "<h2> Your input:</h2>";
echo $name . "<br>";
echo $email . "<br>";
echo $website . "<br>";
echo $comment . "<br>";
echo $education;
?>
</body>
</html>

