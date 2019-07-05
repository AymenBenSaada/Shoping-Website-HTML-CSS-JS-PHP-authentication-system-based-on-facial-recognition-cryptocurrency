<!DOCTYPE html>
<html>
<head>
	<title> Online SHOP</title>
</head>
<body>
	<center>
		<form method='POST' action=''>
			<input type="email" name="email" placeholder="type your mail">
			<br>
			<input type="password" name="password" placeholder="type your password">
			<br>
			<input type="submit" name="submit">
		</form>
	</center>
</body>
</html>
<?php

	//preventing xss attack

//import db paramaters
require "db.php";


//destroying session
session_start();
if (isset($_SESSION['connect']))
{
if ($_SESSION['connect']==1)
{session_unset();}
	
}

//check if the data are submited
if (isset($_POST['submit']))
{

	
	//preparing search user request 
	$req = $conn->prepare('SELECT `id`, `name`, `email`, `password`,`status` FROM `user` where email=?   ') or die ("erreur in preparing");
	
	//binding his email and his password
	$req->bind_param("s",$email) or die("binding erreur");
	$email=$_POST['email'];
	$password=$_POST['password'];
	echo $password."<br>";
	//hashing password
	$password=md5($password);
	echo $password;
	//execute request
	$req->execute();

	//get final output
	$req->bind_result($id,$name,$dbemail,$dbpassword,$status);

	//check if the user exist
	if ($req->fetch())
		{	
			//check if the password is correct
			if(strcmp($password, $dbpassword)==0)
			{

				//start session and save id,name of user to use later
				//change the connexion status to on
				session_unset();
				$_SESSION['idUser']=$id;
				$_SESSION['nameUser']=$name;
				$_SESSION['connect']=1;
				$_SESSION['isAdmin']=FALSE;
				$_SESSION['email']=$email;
				echo $status;
				//check if this connexion is for an admin or for a user
				if ($status==="admin")
				{
					$_SESSION['isAdmin']=TRUE;
					echo $_SESSION['isAdmin'];
				}
				header("Location: profile.php");
			}
			else
			{

				//wrong password
				print "can you please check your password ";
				header("Location: profile.php");

			}

		}
	else
		{
			//user have no account
			print('no data found');
			header("Location: ../index.html");

		}
	
	$req->close();
	$conn->close();

	
}
?>
