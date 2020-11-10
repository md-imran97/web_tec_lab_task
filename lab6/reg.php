<?php
	$name = "";
	$err_name = "";
	$user_name = "";
	$err_user_name = "";
	$password = "";
	$err_password = "";
	$confirm_password = "";
	$err_confirm_password = "";
	$email = "";
	$err_email = "";
	$phone_no = "";
	$phone_code = "";
	$err_phone = "";
	$address_street = "";
	$address_city = "";
	$address_state ="";
	$address_zip ="";
	$err_address ="";
	$birth_day ="";
	$birth_month ="";
	$birth_year ="";
	$err_birth_date ="";
	$gender ="";
	$err_gender ="";
	$sources = "";
	$err_sources = "";
	$bio = "";
	$err_bio = "";
	$fillAll=true;
	
	if(isset($_POST["register"]))
	{
		// name validation
		if(empty($_POST["name"]))
		{
			$err_name = "*required name";
			$fillAll=false;
		}
		else{ $name = htmlspecialchars($_POST["name"]);}
		
		// username validation
		if(empty($_POST["userName"]))
		{
			$err_user_name = "*required user name";
			$fillAll=false;
		}
		else if(strlen($_POST["userName"]) < 6)
		{
			$err_user_name = "*at least 6 char required";
			$fillAll=false;
		}
		else if(strpos($_POST["userName"]," "))
		{
			$err_user_name = "*no space is allowed";
			$fillAll=false;
		}
		else{ $user_name = htmlspecialchars($_POST["userName"]);}
		
		// password validation
		
		if(!empty($_POST["password"]))
		{
			if(strlen($_POST["password"]) >= 8)
			{
				if(!(strtolower($_POST["password"]) == $_POST["password"]) && (!(strtoupper($_POST["password"]) == $_POST["password"])))
				{
					$hasNumber = false;
					$num_arr = array("0","1","2","3","4","5","6","7","8","9");
					$pass =htmlspecialchars($_POST["password"]);
					for($i = 0; $i < strlen($pass); $i++)
					{
						for($j = 0; $j <10; $j++)
						{
							if($pass[$i]== $num_arr[$j])
							{
								//echo "yo<br>";
								$hasNumber = true;
								break;
							}
						}
					}
					if($hasNumber == true)
					{
						if(strpos($_POST["password"], "#") || strpos($_POST["password"], "?"))
						{
							$password = htmlspecialchars($_POST["password"]);
						}
						else{$err_password = "*atleast one special character # or ? is required";$fillAll=false;}
					}
					else{$err_password = "*atleast one digit is required";$fillAll=false;}
				}
				else{$err_password = "*upper and lower case character required";$fillAll=false;}
			}
			else{$err_password = "*minimum password length is 8";$fillAll=false;}
		}
		else{$err_password = "*password required";$fillAll=false;}

		if($_POST["password"] != htmlspecialchars($_POST["confirmPassword"]))
		{
			$err_confirm_password = "*password not matched";
			$fillAll=false;
		}
		
		// email validation
		
		if(empty($_POST["email"]))
		{
			$err_email = "*required email";
			$fillAll=false;
		}
		else if(strpos($_POST["email"],"@"))
		{
			$flag = false;
			$pos = strpos($_POST["email"],"@");
			$str = $_POST["email"];
			for($i = $pos; $i < strlen($str); $i++)
			{
				//echo $i ."<br>";
				//echo $pos ."<br>";
				if($str[$i] == "."){$flag = true;break;}
			}
			if($flag == true){$email = htmlspecialchars($_POST["email"]);}
			else{$err_email = "*invalid email pattern";$fillAll=false;}
		}
		
		
		// phone validate
		
		//if(empty($_POST["code"]))
		//{
			//$err_phone = "*required code and number";
		//}
		//else if(!is_numeric($_POST["code"]))
		//{
			//$err_phone = "*required numeric charecter";
		//}
		//else{ $phone_code = htmlspecialchars($_POST["code"]);}
		
		if(empty($_POST["phone"]))
		{
			$err_phone = "*required code and number";
			$fillAll=false;
		}
		else if(!is_numeric($_POST["phone"]))
		{
			$err_phone = "*required numeric charecter";
			$fillAll=false;
		}
		else{ $phone_no = htmlspecialchars($_POST["phone"]);}
		
		// address validate
		
		//if(empty($_POST["street"]))
		//{
		//	$err_address = "*required street, city state and zip code";
		//}
		//else{ $address_street = htmlspecialchars($_POST["street"]);}
		
		if(!isset($_POST["city"]))
		{
			$err_address = "*required street, city state and zip code";
			$fillAll=false;
		}
		else{ $address_city = htmlspecialchars($_POST["city"]);}
		
		//if(empty($_POST["state"]))
		//{
		//	$err_address = "*required street, city state and zip code";
		//}
		//else{ $address_state = htmlspecialchars($_POST["state"]);}
		
		//if(empty($_POST["zip"]))
		//{
		//	$err_address = "*required street, city state and zip code";
		//}
		//else{ $address_zip = htmlspecialchars($_POST["zip"]);}
		
		// birth date validate
		
		if(isset($_POST["day"]))
		{
			$birth_day = $_POST["day"];
		}
		else{$err_birth_date = "*day, month, year required";}
		
		if(isset($_POST["month"]))
		{
			$birth_month = $_POST["month"];
		}
		else{$err_birth_date = "*day, month, year required";}
		
		if(isset($_POST["year"]))
		{
			$birth_year = $_POST["year"];
		}
		else{$err_birth_date = "*day, month, year required";}
		
		// gender validate
		
		if(isset($_POST["gender"]))
		{
			$gender = $_POST["gender"];
		}
		else{$err_gender = "*gender required";$fillAll=false;}
		
		// sources validate
		
		if(isset($_POST["sources"]))
		{
			$sources = $_POST["sources"];
		}
		else{$err_sources = "*sources required";}
		
		// bio validate
		
		if(!empty($_POST["bio"]))
		{
			$bio = htmlspecialchars($_POST["bio"]);
		}
		else{$err_bio = "*bio required";}
		
		if($fillAll==true)
		{
			$users = simplexml_load_file("admin.xml");
			
			$user = $users->addChild("user");
			$user->addChild("name",$name);
			$user->addChild("password",$password);
			$user->addChild("username","$user_name");
			$user->addChild("gender",$gender);
			$user->addChild("email",$email);
			$user->addChild("phone","$phone_no");
			$user->addChild("city",$address_city);
			
			//echo "<pre>";
			//print_r($users);
			//echo "</pre>";
			
			$xml = new DOMDocument("1.0");
			$xml->preserveWhiteSpace=false;
			$xml->formatOutput= true;
			$xml->loadXML($users->asXML());
			
			
			$file = fopen("admin.xml","w");
			fwrite($file,$xml->saveXML());
			echo "register successfully";
		}
		else{echo "registation not successful";}
	}
	
?>	
	
<html>
	<head>
		<title>Registation</title>
	</head>
	<body>
		
		<hr>
		<form action="" method="post">
			<fieldset>
				<legend><h1>Welcome to Registration form</h1></legend>
				<table>
					<tr>
						<td align="right">Full Name:</td>
						<td><input type="text" name="name" value="<?php echo $name; ?>"><?php echo $err_name; ?></td>
					</tr>
					<tr>
						<td align="right">Username:</td>
						<td><input type="text" name="userName" value="<?php echo $user_name; ?>"><?php echo $err_user_name; ?></td>
					</tr>
					<tr>
						<td align="right">Password:</td>
						<td><input type="password" name="password" value="<?php echo $password; ?>"><?php echo $err_password; ?></td>
					</tr>
					<tr>
						<td align="right">Confirm Password:</td>
						<td><input type="password" name="confirmPassword" value="<?php echo $password; ?>"><?php echo $err_confirm_password; ?></td>
					</tr>
					<tr>
						<td align="right">Email:</td>
						<td><input type="text" name="email" value="<?php echo $email; ?>"><?php echo $err_email; ?></td>
					</tr>
					<tr>
						<td align="right" >contact no:</td>
						<td>
							 <input type="text" placeholder="Number" size="11" name="phone" value="<?php echo $phone_no ?>"><?php echo $err_phone; ?>
						</td>
					</tr>
					<tr>
						<td >city :</td>
						<td>
							<select name ="city">
								<option disabled selected>Select a city</option>
								<option>Dhaka</option>
								<option>Khulna</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td align="right">Gender:</td>
						<td>
							<input type="radio" name="gender" value="Male"> Male
							<input type="radio" name="gender" value="Female"> Female   <?php echo " ".$err_gender; ?>
						</td>
					</tr>
					
					
					<tr>
						<td colspan="2" align="center"><input type="submit" name="register" value="register"></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
	
</html>