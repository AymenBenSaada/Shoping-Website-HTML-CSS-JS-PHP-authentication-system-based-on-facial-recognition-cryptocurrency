<?php
require 'db.php';
session_start();
if(!(isset($_SESSION['connect'])))
{
	header("location:../");
}
else
{
$userId=$_SESSION['idUser'];
$req = $conn->prepare('SELECT  `name`, `email`, `password`, `phoneNumber`, `address` FROM `user` WHERE id=?') or die ("erreur in preparing searching user data request");
	
$req->bind_param('i',$userId) or die ("binding param of searching user data request error");		
$req->execute() or die ("executing of searching user data request error");
$req->bind_result($name,$email,$password,$phoneNumber,$address);
while ($req->fetch()) {
	continue;
}
?>
<!DOCTYPE html>
<head>
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
</head>
<body>
<form method='POST' action='' name="f" onsubmit="return validateForm()" enctype="multipart/form-data">
			<input type="email" name="email" placeholder="type your mail"  value='<?php echo $email; ?>'>
			<br><br>
			<input type="password" name="password" placeholder="type your password" >
			<br><br>
			<input type="password" name="confirmPassword" placeholder="confirm your password" >
			<br><br>
			<input type="text" name="name" placeholder="type your name"  value='<?php echo $name; ?>'>
			<br><br>
			<input type="text" name="address" placeholder="type your address" value='<?php echo $address; ?>' >
			<br><br>
			<input type="text" name="phoneNumber" placeholder="type your phone number" value='<?php echo $phoneNumber; ?>' >
			<br><br>
			<input type="file" name="image">
			<br><br>

			<input type="submit" name="s">

</form>
</body>
</html>
<?php
if (isset($_POST['s']))
{
	if (strcmp($email, $_POST['email'])) $email=$_POST['email'];
	if (strcmp(md5($_POST['password']), $password)) $password=md5($_POST['password']);
	if (strcmp($_POST['name'], $name)) $name=$_POST['name'];
	if (strcmp($_POST['address'], $address)) $address=$_POST['address'];
	if (strcmp($_POST['phoneNumber'],$phoneNumber)) $phoneNumber=$_POST['phoneNumber'];


	$req = $conn->prepare('UPDATE user SET name=?,email=?,password=?,phoneNumber=?,address=? where id=?') or die ("erreur in preparing select request");
	$req->bind_param('sssssi',$name,$email,$password,$phoneNumber,$address,$_SESSION['userId']) or die ("erreur binding param");

	$req->execute() or die ("error executing request".htmlspecialchars($req->error));
	//check if the upload pf the user picture
			if(isset($_FILES["image"]["tmpfile(oid)"]))
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
			print("succesful update account ...");
			header('refresh:5;url=../');

}

}
?>