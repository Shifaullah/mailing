<?php 
$name_error = "";
$email_error = "";
$website_error = "";
$gender_error = "";
// when submit form

if(isset($_POST['submit'])){
	// globals
$submit = $_POST['submit'];
$name = $_POST['name'];
$website = $_POST['website'];
$email = $_POST['email'];
$name_regx = "";
$email_regx = "";
$website_regx = "";
	// if empty field
	if (empty($name)){
		$name_error = "name is required";
	}else{
		if(!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])){
			$name_error = "only letters and white spaces are allowed.";
			$name_regx = false;

		}else{
			$name_regx = true;
		}
	}

	if (empty($website)){
		$website_error = "website name is required";
	}else{
		if(!preg_match("/[a-zA-Z-_.]{3,}@[a-zA-Z-_.]{3,}[.]{1}[a-z]{2,}/",$_POST['email'])){
			$website_error = "invalid email format.";
			$website_regx = false;

		}else{
			$website_regx = true;
		}
	}

	if (empty($email)){
		$email_error = "email is required";
	}else{
		if(!preg_match("/[a-zA-Z-_.]{3,}@[a-zA-Z-_.]{3,}[.]{1}[a-z]{2,}/",$_POST['email'])){
			$email_error = "invalid email format.";
			$email_regx = false;

		}else{
			$email_regx = true;
		}
	}

	if (empty($_POST['gender'])){
		$gender_error = "gender is required";
	}

	// to show form data on screen when fields are not empty.
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['website']) && !empty($_POST['gender']) && $name_regx == true && $email_regx == true && $website_regx == true){

		$message = "my name is: ".$_POST['name']."\n my email is: ".$_POST['email']."\n and my gender is: ".$_POST['gender']."\n and my website address is: ".$_POST['website'];

		if(mail($_POST['email'],'just trying',$message,"From: zain khan")){
			echo "<script>
					alert('email sent to ".$_POST['name']."');
				</script>";
		}else{
			echo "<script>
					alert('email not sent');
				</script>";
		}
	}
}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>form validation</title>
 	<style>
 		form{
 			display: block;
 			margin:50px auto;
 			box-shadow: 0px 0px 3px #000000aa;
 			padding: 50px 100px;
 			width:500px;
 		}
 	</style>
 </head>
 <body>
 	<form action="index.php" method="post">

 		<label>Name: <br><input type="text" name="name"><span class="error">*
 			<?php echo "$name_error"; ?>
 		</span></label><br>

 		<label>email: <br><input type="email" name="email"><span class="error">*
 			<?php echo "$email_error"; ?>
 		</span></label><br>

 		<label>website: <br><input type="text" name="website"><span class="error">*
 			<?php echo "$website_error"; ?>
 		</span></label><br><br>

 		Gender: <label>Male<input type="radio" name="gender" value="male">
 				Female<input type="radio" name="gender" value="Female">
 				Other<input type="radio" name="gender" value="Other"></label> 
 				<span class="error">*
 		 	<?php echo "$gender_error"; ?>
 		 </span></label><br><br>

 		 <input type="submit" value="Submit" name="submit">
 	</form>
 </body>
 </html>