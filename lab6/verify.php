<?php
	session_start();
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$hasError=false;
	if(isset($_POST["login"])){
		if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError =true;	
		}
		else{
			$uname = htmlspecialchars($_POST["uname"]);
		}
		if(empty ($_POST["pass"])){
			$err_pass="Password Required";
			$hasError = true;
		}
		else{
			$pass=htmlspecialchars($_POST["pass"]);
		}
		
		if(!$hasError){
			$users = simplexml_load_file("admin.xml");
			
			$data = $users->user;
			//echo $data[1]->username;
			$i=0;
			$_SESSION["username"] = "";
			$_SESSION["password"] = "";
			for( ;$i<count($data);$i++)
			{
				
				if($data[$i]->username == $uname && $data[$i]->password == $pass)
				{
					header("Location: dash.php");
					$_SESSION["username"] = $uname;
					$_SESSION["password"] = $pass;
					break;
				}
					
			}
			if($i==count($data))
			{
				echo "invalid id or pass";
			}
			//$user = $users->addChild("user");
			//$user->addChild("username",$uname);
			//$user->addChild("password",$pass);
			//$user->addChild("type","user");
			//echo "<pre>";
			//print_r($users);
			//echo "</pre>";
			
			//$xml = new DOMDocument("1.0");
			//$xml->preserveWhiteSpace=false;
			//$xml->formatOutput= true;
			//$xml->loadXML($users->asXML());
			
			
			//$file = fopen("data.xml","w");
			//fwrite($file,$xml->saveXML());
		}
	}
	
?>