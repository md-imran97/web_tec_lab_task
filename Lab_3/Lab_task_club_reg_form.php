<?php
	$name = "";
	$err_name = "";
	$userName = "";
	$err_userName = "";
	$password = "";
	$err_password = "";
	$email = "";
	$err_email = "";
	
	
	
<html>
	<head>
		<title>Registation</title>
	</head>
	<body>
		
		<hr>
		<form action="" method="post">
			<fieldset>
				<legend>Club Member Registration</legend>
				<table>
					<tr>
						<td align="right">Name:</td>
						<td><input type="text" name="name"> <?php echo $err_name;?></td>
					</tr>
					<tr>
						<td align="right">Username:</td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td align="right">Password:</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td align="right">Confirm Password:</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td align="right">Email:</td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td align="right">Phone:</td>
						<td>
							<input type="text" placeholder="code" size="3"> - <input type="text" placeholder="Number" size="11">
						</td>
					</tr>
					<tr>
						<td align="right">Address:</td>
						<td>
							<input type="text" placeholder="Street Address">
						</td>
					<tr>
						<td></td>
						<td>
							<input type="text" placeholder="City" size="3"> - <input type="text" placeholder="State" size="11">
						</td>
					
							<input type="text" placeholder="Postal/Zip"><br>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="text" placeholder="Postal/Zip">
						</td>
					</tr>
					<tr>
						<td align="right">Birth Date:</td>
						<td>
							<select name="profession" size="1">
								<?php
									$months = array("Day","jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec");
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
							<select name="profession">
								<option disabled selected>Choose</option>
								<option >Teacher</option>
								<option >Student</option>
								<option >Business</option>						
							</select>
							<select name="profession">
								<option disabled selected>Choose</option>
								<option >Teacher</option>
								<option >Student</option>
								<option >Business</option>						
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Gender: <?php echo $err_gender;?></td>
						<td>
							<input type="radio" name="gender" value="Male"> Male
							<input type="radio" name="gender" value="Female"> Female
						</td>
					</tr>
					<tr>
						<td align="right">Hobbies:  <?php echo $err_hobbies;?></td>
						<td>
							<input type="checkbox" name="hobbies[]" value="Movies"> Movies<br>
							<input type="checkbox" name="hobbies[]" value="Music"> Music <br>
							<input type="checkbox" name="hobbies[]" value="Programming"> Programming<br>
							<input type="checkbox" name="hobbies[]" value="Travelling"> Travelling <br>
							<input type="checkbox" name="hobbies[]" value="Adventure"> Adventure<br>
							<input type="checkbox" name="hobbies[]" value="Gradenning"> Gardenning<br>
						</td>
					</tr>
					<tr>
						<td align="right">Bio:</td>
						<td>
							<textarea name="io" ></textarea>
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