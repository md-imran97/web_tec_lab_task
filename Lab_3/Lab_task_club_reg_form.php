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
	
	if(isset($_POST["register"]))
	{
		// name validation
		if(empty($_POST["name"]))
		{
			$err_name = "*required name";
		}
		else{ $name = htmlspecialchars($_POST["name"]);}
		
		// username validation
		if(empty($_POST["userName"]))
		{
			$err_user_name = "*required user name";
		}
		else if(strlen($_POST["userName"]) < 6)
		{
			$err_user_name = "*at least 6 char required";
		}
		else if(strpos($_POST["userName"]," "))
		{
			$err_user_name = "*no space is allowed";
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
						else{$err_password = "*atleast one special character # or ? is required";}
					}
					else{$err_password = "*atleast one digit is required";}
				}
				else{$err_password = "*upper and lower case character required";}
			}
			else{$err_password = "*minimum password length is 8";}
		}
		else{$err_password = "*password required";}

		if($_POST["password"] != htmlspecialchars($_POST["confirmPassword"]))
		{
			$err_confirm_password = "*password not matched";
		}
		
		// email validation
		
		if(empty($_POST["email"]))
		{
			$err_email = "*required email";
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
			else{$err_email = "*invalid email pattern";}
		}
		
		
		// phone validate
		
		if(empty($_POST["code"]))
		{
			$err_phone = "*required code and number";
		}
		else if(!is_numeric($_POST["code"]))
		{
			$err_phone = "*required numeric charecter";
		}
		else{ $phone_code = htmlspecialchars($_POST["code"]);}
		
		if(empty($_POST["number"]))
		{
			$err_phone = "*required code and number";
		}
		else if(!is_numeric($_POST["number"]))
		{
			$err_phone = "*required numeric charecter";
		}
		else{ $phone_no = htmlspecialchars($_POST["number"]);}
		
		// address validate
		
		if(empty($_POST["street"]))
		{
			$err_address = "*required street, city state and zip code";
		}
		else{ $address_street = htmlspecialchars($_POST["street"]);}
		
		if(empty($_POST["city"]))
		{
			$err_address = "*required street, city state and zip code";
		}
		else{ $address_city = htmlspecialchars($_POST["city"]);}
		
		if(empty($_POST["state"]))
		{
			$err_address = "*required street, city state and zip code";
		}
		else{ $address_state = htmlspecialchars($_POST["state"]);}
		
		if(empty($_POST["zip"]))
		{
			$err_address = "*required street, city state and zip code";
		}
		else{ $address_zip = htmlspecialchars($_POST["zip"]);}
		
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
		else{$err_gender = "*gender required";}
		
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
				<legend><h1>Club Member Registration</h1></legend>
				<table>
					<tr>
						<td align="right">Name:</td>
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
						<td align="right">Phone:</td>
						<td>
							<input type="text" placeholder="code" size="3" name="code" value="<?php echo $phone_code; ?>"> - <input type="text" placeholder="Number" size="11" name="number" value="<?php echo $phone_no ?>"><?php echo $err_phone; ?>
						</td>
					</tr>
					<tr>
						<td align="right">Address:</td>
						<td>
							<input type="text" placeholder="Street Address" name="street" value="<?php echo $address_street; ?>"><?php echo $err_address; ?>
						</td>
					<tr>
						<td></td>
						<td>
							<input type="text" placeholder="City" size="3" name="city" value="<?php echo $address_city; ?>"> - <input type="text" placeholder="State" size="11" name="state" value="<?php echo $address_state; ?>">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="text" placeholder="Postal/Zip" name="zip" value="<?php echo $address_zip; ?>">
						</td>
					</tr>
					<tr>
						<td align="right">Birth Date:</td>
						<td>
							<select name="day" >
								<?php
									
									for ($i = 0; $i < 32; $i++) {
										if($i == 0)
										{

											echo "<option value='' disabled selected>Day</option>";
										}
										else
										{
											echo "<option value='$i'>$i</option>";
										}
									}
								?>						
							</select>
							<select name="month" >
								<?php
									$months = array("Month","jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec");
									for ($i = 0; $i < 13; $i++) {
										if($i == 0)
										{

											echo "<option value='$months[$i]' disabled selected>$months[$i]</option>";
										}
										else
										{
											echo "<option value='$months[$i]'>$months[$i]</option>";
										}
									}
								?>						
							</select>
							<select name="year" >
								<?php
									
									for ($i = 1996; $i < 2005; $i++) {
										if($i == 1996)
										{

											echo "<option value='$i' disabled selected>Year</option>";
										}
										else
										{
											echo "<option value='$i'>$i</option>";
										}
									}
								?>						
							</select><?php echo $err_birth_date; ?>
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
						<td align="right">Where did you hear about us?:</td>
						<td>
							<input type="checkbox" name="sources[]" value="A Friend or Colleague"> A Friend or Colleague<br>
							<input type="checkbox" name="sources[]" value="Google"> Google<br>
							<input type="checkbox" name="sources[]" value="Blog Post"> Blog Post <?php echo " ".$err_sources; ?><br>
							<input type="checkbox" name="sources[]" value="News Article"> News Article <br>
							
						</td>
					</tr>
					<tr>
						<td align="right">Bio:</td>
						<td>
							<textarea name="bio" value="<?php echo $bio; ?>" ></textarea> <?php echo " ".$err_bio; ?>
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