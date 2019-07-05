<?php
if(isset($_SESSION['connect']))
{
	session_destroy();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title> Online SHOP</title>
</head>
<body>
	<center>
		<form method='POST' action='' name="f" onsubmit="return validateForm()" enctype="multipart/form-data">
			<input type="email" name="email" placeholder="type your mail" required>
			<br><br>
			<input type="password" name="password" placeholder="type your password" required>
			<br><br>
			<input type="password" name="confirmPassword" placeholder="confirm your password" required>
			<br><br>
			<input type="text" name="name" placeholder="type your name" required>
			<br><br>
			<input type="text" name="address" placeholder="type your address" required>
			<br><br>
			<input type="text" name="phoneNumber" placeholder="type your phone number"  required>
			<br><br>
			<input type="file" name="image">
			<br><br>

			<input type="submit" name="submit">
		</form>
	</center>
<script type="text/javascript">
function validateForm()
{	
	var password=document.f.password.value;
	var password1=document.f.confirmPassword.value;
	var phoneNumber=document.f.phoneNumber.value;
	if (password!=password1)
	{
		alert("passwords did not match");
		return false;
	}
	if (isNaN(phoneNumber))
	{
		alert("this is not a phone number");
		return false;
	}
}

</script>
</body>
</html>
<?php
require "db.php";
if (isset($_POST['submit']))
{
	//prepare check existence request
	$req = $conn->prepare('SELECT `id` FROM `user` where email=?  ') or die ("erreur in preparing");
	
	// binding var
	$req->bind_param("s",$email) or die("binding erreur");
	$email=$_POST['email'];

	// execute request and get the output of the query
	$req->execute();
	$req->bind_result($id);

	//check the existence of the user
	if ($req->fetch())
		{	
			print 'you have already an account please check your email';
			header('refresh:5;url=../'); 
		}
	else
		{	
			//hashing password with md5
			$password=$_POST['password'];
			$password=md5($password);


			//importing data
			$name=$_POST['name'];
			$address=$_POST['address'];
			$phoneNumber=$_POST['phoneNumber'];
			
			// preparing insert user data query
			$req = $conn->prepare('INSERT INTO `user` (`name`, `email`, `password`, `phoneNumber`, `address`) VALUES (?,?,?,?,?)') or die ("erreur in preparing");

			// binding imported data
			$req->bind_param("sssss",$name,$email, $password,$phoneNumber,$address) or die("binding erreur");

			//execute request
			$req->execute();


			//check if the upload pf the user picture
			if(isset($_FILES["image"]["name"]))
			{




				//getting the user picture
				$imagename=$_FILES["image"]["name"]; 

				//Get the content of the image and then add slashes to it 
				$imagetmp= file_get_contents($_FILES['image']['tmp_name']);

				//Insert the image name and image content in image_table
				$insert_image=$conn->prepare("INSERT INTO `Picture`(`tableName`, `name`,`content`, `idProvider`) VALUES ('user',?,?,?)") or die ("erreur preparing picture data".htmlspecialchars($insert_image->error));

				//set the value of the table name

							//searching for user id
							$request = $conn->prepare('SELECT `id` FROM `user` where email=? ') or die ("erreur in preparing");
	
							// binding his email
							$request->bind_param("s",$email) or die("binding erreur");

							// execute request and get the id
							$request->execute() or die ("executing request error");
							$request->bind_result($id1);
							
						while($request->fetch())
							{continue;}

				//binding picture data 
				$insert_image->bind_param("sss",$imagename,$imagetmp,$id1) or die("binding erreur");

				//execute insert image
				$insert_image->execute() or die("erreur executing insert image request".htmlspecialchars($insert_image->error));
		
			
			}
			print("succesful creating account ...");
			header('refresh:5;url=../'); 


		}


}
?>