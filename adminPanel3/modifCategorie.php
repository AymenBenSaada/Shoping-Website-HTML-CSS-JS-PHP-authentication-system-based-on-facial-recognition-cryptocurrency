<?php
session_start();
require 'db.php';
if (isset($_SESSION['isAdmin'])!=FALSE)
{


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
				
		
				
					
					
			</div>










			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Update Categorie </h3>
					
				</div>
			
			<div class="panel-body">

	<form action='modif_Categorie.php' method='GET' role="form" id="form1"  class="validate">
	
			<?php
			require 'db.php';

			$req = $conn->prepare('SELECT `id`, `name`, `description` FROM `Category`') or die ("erreur in preparing select request");
			
			//binding his email and his password
			$req->execute();

			$req->bind_result($id,$name,$description);
			 echo "<select class='form-control' name='id'>";
			     // <--- change to $result->...!
   			 	while ($req->fetch()) 
   			 	{
        			echo "<option  value='".$id."'> ".$name."</option>";  // <--- available in $data
    			}
    		echo "</select>";
			?>
			<br><br>
			<input type='submit'  class='form-control' name='s'>
	</form>
</body>
</html>
<?php

}
?>