<?php
session_start();
if ($_SESSION['isAdmin']==FALSE)
{
		header("Location: ../index.html");
		echo $_SESSION['isAdmin'];
}

	if (isset($_GET['id']))
		{
			$id=$_GET['id'];


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
						<a href="ui-panels.html">

							<i class="linecons-star"></i>
							<span class="title">Categories</span>
						<ul>
							<li>
								<a href="ajoutCategorie.php">
									<span class="title">Add categories </span>
								</a>
							</li>
							<li>
								<a href="modif_Categorie.php">
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
								<a href="modif_Produit.php">
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
						
										<a href="forms-native.html">Produit</a>
								</li>
							<li class="active">
						
										<strong>Update</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
			<div class="panel panel-default">
			
				<div class="panel-heading">
					<div class="panel-title">
					</div>
					
					<small class="text-small pull-right" style="padding-top:5px;">
					</small>
				</div>
				










				<div class="panel-body">
				 
					<form role="form" id="form1" method="post" action=''  enctype="multipart/form-data" class="validate">
						
					



































	<?php
	require 'db.php';	

	$req= $conn->prepare("SELECT  `name`,`gender`, `categoryId`, `price`,`description`, `inPromotion`, `percentage`, `amount`, `availability`, `archive` FROM `Product` WHERE id=?") or die ("select query error");
	$req->bind_param("i",$_GET['id']) or die ("binding error");
	$req->execute() or die ("executing error");
	$req->bind_result($name,$gender,$categoryId,$price,$description,$inPromotion,$percentage,$amount,$availability,$archive)  or die ("getting result error");
	while ($req->fetch()) 
   			{
   				echo "<label>name :</label><br>";
   				echo "<input  class='form-control'   type='text' name='name' value=".$name."><br>";
               echo "<label> description :</label><br>";
               echo "<input    class='form-control' type='text' name='description' value=".$description."><br>";
               
               echo "<label> gender :</label><br>";
               echo "<select   class='form-control'  name='gender'><option value='w'>women</option><option value='m'>men</option><option value='c'>children</option><option value='o'>other</option></select><br>";
   				echo "<label>price :</label><br>";
   				echo "<input     type='text' name='price' class='form-control' value=".$price."><br>";


   				require 'db.php';
				//searching for category name
   				$req1= $conn->prepare("SELECT `name`,`id`  FROM `Category`  ") or die ("select name query error");
				#$req1->bind_param() or die ("binding error");
				$req1->execute() or die ("executing error");
				$req1->bind_result($nameCategory,$ids)  or die ("getting result error");
				echo "<label>Categorie </label><br><select class='form-control'  name='categoryId'>";
				while ($req1->fetch())
   				{	
   					if ($ids==$categoryId)
   					{
   						echo "<option value=".$ids." selected>".$nameCategory."</option>";

   					}
   					else
   					{
   						echo "<option value=".$ids.">".$nameCategory."</option>";

   					}
   				}
   				echo "</select><br>" ;
   				echo "<label>amount :</label><br>";
   				echo "<input type='text'  name='amount' class='form-control' value=".$amount."><br>";

   				echo "<label>availability :</label><br><select class='form-control' name='availability'>";
   				if ($availability==0)   
   				{
   					echo "<option value=".($availability)." selected> False</option>";
   					echo "<option value='1' > True</option>";

   				} 
   				else
   				{
   		   		echo "<option value=".($availability)." selected> True</option>";
   				echo "<option value='0' > False</option>";
			
   				}
   				echo"</select><br>";
				






   				echo "<label>inPromotion :</label><br><select  class='form-control'  name='inPromotion'>";
   				if ($inPromotion==0)   
   				{
   					echo "<option value=".($inPromotion)." selected> False</option>";
   					echo "<option value='1' > True</option>";

   				} 
   				else
   				{
   		   		echo "<option value=".($inPromotion)." selected> True</option>";
   				echo "<option value='0' > False</option>";
			
   				}
   				echo"</select><br>";



   		   		echo "<label>percentage :</label><br>";
   				echo "<input type='text'  class='form-control' name='percentage' value=".($percentage*100)."><br>";
   				



   				echo "<label>archive :</label><br><select class='form-control' name='archive'>";
   				if ($archive==0)   
   				{
   					echo "<option value=".($archive)." selected> False</option>";
   					echo "<option value='1' > True</option>";

   				} 
   				else
   				{
   		   		echo "<option value=".($archive)." selected> True</option>";
   				echo "<option value='0' > False</option>";
			
   				}
   				echo"</select><br>";
   				

			}
	?>
	<br>
	<input type='submit' class='form-control' name='s'>














					
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

		$req1= $conn->prepare('UPDATE `Product` SET  `name`=?,gender=?,`description`=?, `categoryId`=?, `price`=?, `inPromotion`=?, `percentage`=?, `amount`=?, `availability`=?, `archive`=? WHERE `id`=?') or die ("erreur in preparing updating request");
					
			$req1->bind_param("ssssdidiiis",$_POST['name'],$_POST['gender'],$_POST['description'],$_POST['categoryId'],$_POST['price'],$_POST['inPromotion'],$_POST['percentage'],$_POST['amount'],$_POST['availability'],$_POST['archive'],$id) or die("binding erreur");

			//binding his email and his password
			$req1->execute() or die ("executing updating request error");
			echo "this product has been updated";

	}












	}		
?>