<?php
session_start();
if ($_SESSION['isAdmin']==FALSE)
{
		header("Location: ../index.html");
		echo $_SESSION['isAdmin'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>Boutiquna -Admin Panel</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/xenon-core.css">
	<link rel="stylesheet" href="assets/css/xenon-forms.css">
	<link rel="stylesheet" href="assets/css/xenon-components.css">
	<link rel="stylesheet" href="assets/css/xenon-skins.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">


		

	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				
			
						
				
						
				<ul id="main-menu" class="main-menu">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
					<li>
						<a href="main.php">
							<i class="linecons-cog"></i>
							<span class="title">Main</span>
						</a>
					</li>
					<li>	
						<a href="">

							<i class="linecons-star"></i>
							<span class="title">Categories</span>
						</a>
						<ul>
							<li>
								<a href="ajoutCategorie.php">
									<span class="title">Add categories </span>
								</a>
							</li>
							<li>
								<a href="modifCategorie.php">
									<span class="title">Update categories</span>
								</a>
							</li>
							<li>
								<a href="categorie.php">
									<span class="title">View  categories</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="ui-panels.html">
							<i class="linecons-note"></i><i class="fas fa-tshirt"></i>
							<span class="linecons-basket">Product</span>
						</a>
						<ul>
							<li>
								<a href="ajoutProduit.php">
									<span class="title">Add product</span>
								</a>
							</li>
							<li>
								<a href="modifProduit.php">
									<span class="title">Update Product</span>
								</a>
							</li>
							<li>
								<a href="produits.php">
									<span class="title">View Product</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="mailbox-main.html">
							<i class="linecons-params"></i>
							<span class="title">Sells</span>
						</a>
						<ul>
							<li>
								<a href="Dashboard.php">
									<span class="title">View sells per month</span>
								</a>
							</li>
							<li>
								<a href="Dashboard.php">
									<span class="title">View sells per person</span>
								</a>
							</li>
							<li>
								<a href="Dashboard.php">
									<span class="title">View sells per product</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="opened active">
						<a href="users.php">

							<i class="linecons-database"></i>
							<span class="title">Users</span>
						</a>
						<ul>
							<li>
								<a href="users.php">
									<span class="title">View users</span>
								</a>
							</li>
							
						</ul>
					</li>
					
				</ul>
						
			</div>
			
		</div>
		
			<div class="page-title">
				

					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
						</li>
								<li>
						
										<a href="forms-native.html">Product</a>
								</li>
							<li class="active">
						
										<strong>Add</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
			<div class="panel panel-default">
			
				<div class="panel-heading">
					<div class="panel-title">
					</div>
					
					<small class="text-small pull-right" style="padding-top:5px;">
						<code></code>
					</small>
				</div>
				










				<div class="panel-body">
				 
					<form role="form" id="form1" method="post" action=''  enctype="multipart/form-data" class="validate">
						
						<div class="form-group">
							<label class="control-label">Product Name</label>
							
							<input class="form-control" type='text' placeholder='product name' name='productName' required />
						</div>
						
						<div class="form-group">
							<label class="control-label">select gender</label>
							
							<select  class="form-control" name='gender'  placeholder="Email Field" />
						

										<option value='w'>femme</option>
										<option value='m'>homme</option>
										<option value='c'>enfants</option>
										<option value='a'>accessoires</option>


						</select>
						</div>
						
						<div class="form-group">
							<label class="control-label">Price</label>
							
							<input  type='number' name='price' placeholder='Price' required/>
						</div>
						













<?php
		require 'db.php';

			$req = $conn->prepare('SELECT `id`, `name`, `description` FROM `Category` where archive=0') or die ("erreur in preparing select request 3");
			
			//binding his email and his password
			$req->execute();

			$req->bind_result($id,$name,$description);
			echo "<label class='control-label'>Category</label>";
			 echo "<select class='form-control' name='id'>";
			     // <--- change to $result->...!
   			 	while ($req->fetch()) 
   			 	{
        			echo "<option  value='".$id."'> ".$name."</option>";  // <--- available in $data
    			}
    		echo "</select>";
		?>








						<div class="form-group">
							<label class="control-label">amount</label>
							
							<input type="number" class="form-control"  name="amount" placeholder="amount">						
					</div>
						
						<div class="form-group">
							<label class="control-label">Description</label>
							
							<input  type='text'   class="form-control" name='description' placeholder="description ">					
							</div>
						
						<div class="form-group">
							<label class="control-label">image</label>
							
							<input type='file' class="form-control" name='image'>						
						</div>
						
						
						
						<div class="form-group">
							<input type="submit" name='s' class="btn btn-success">
							<button type="reset" class="btn btn-white">Reset</button>
						</div>
					
					</form>
				
				</div>
			
			</div>
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>
		
			
		
				
	
	



	<!-- Bottom Scripts -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/TweenMax.min.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/xenon-api.js"></script>
	<script src="assets/js/xenon-toggles.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/jquery-validate/jquery.validate.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/xenon-custom.js"></script>

</body>
</html>









<?php

if (isset($_POST['s']))
{
			$req = $conn->prepare('SELECT `id`, `name`, `categoryId` FROM `Product` WHERE  name=? and categoryId=?') or die ("erreur in preparing select request 2");

			$req->bind_param("si",$_POST['productName'],$id) or die("binding erreur");

			//binding his email and his password
			$req->execute();




			if ($req->fetch())
			{

				require 'db.php';


			$req1= $conn->prepare('UPDATE `Product` SET `gender`=?,`categoryId`=?,`price`=?,`amount`=?,`description`=? WHERE `name`=?') or die ("erreur in preparing updating request");
					

			$req1->bind_param("siddss",$_POST['gender'],$id,$_POST['price'],$_POST['amount'],$_POST['productName'],$_POST['description']) or die("binding erreur");

			//binding his email and his password
			$req1->execute() or die ("executing updating request error");

			echo "you have already this product , amount and price was been updated";

			}
			

			else
			{

			$req = $conn->prepare('INSERT INTO `Product`(`name`,`gender`, `categoryId`, `price`,  `amount`,`description`) VALUES (?,?,?,?,?,?)') or die ("erreur in preparing insert request 1");
			

			$req->bind_param("ssssss",$_POST['productName'],$_POST['gender'],$id,$_POST['price'],$_POST['amount'],$_POST['description']) or die("binding erreur");

			//binding his email and his password
			$req->execute() or die ("executing insert request error".htmlspecialchars($req->error));

			print "succes adding";
					$conn1 = new mysqli($servername, $username, $password, $db);

				if (file_exists($_FILES['image']['tmp_name']))
				{


				//getting the user picture
				$imagename=$_FILES["image"]["name"]; 

				//Get the content of the image and then add slashes to it 
				$imagetmp= file_get_contents($_FILES['image']['tmp_name']);

				//Insert the image name and image content in image_table
				$insert_image=$conn1->prepare("INSERT INTO `Picture`(`tableName`, `name`,`content`, `idProvider`) VALUES ('Product',?,?,?)") or die ("erreur preparing picture data".htmlspecialchars($insert_image->error));

				//set the value of the table name

							//searching for user id
							$request = $conn->prepare('SELECT `id` FROM `Product` where name=? and categoryId=?  ') or die ("erreur in preparing");
	
							// binding his email
							$request->bind_param("ss",$_POST['productName'],$id) or die("binding erreur");

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
			
			}

}


?>