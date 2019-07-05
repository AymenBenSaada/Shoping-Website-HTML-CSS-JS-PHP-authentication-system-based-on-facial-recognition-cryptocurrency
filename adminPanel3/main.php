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
				
		
				
					
					
			</div>










			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Dispaly product</h3>
					
				</div>
			
			<div class="panel-body">

			<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>image</th>
								<th>name</th>
								<th>gender</th>
								<th>category</th>
								<th>price</th>
								<th>percentage</th>
								<th>availability</th>
								<th>amount</th>
								<th>Action</th>

							</tr>
						</thead>
					
						
					
						<tbody>
							<?php
			require 'db.php';
			$req = $conn->prepare('SELECT `id`, `name`,`gender`, `categoryId`, `price`, `inPromotion`, `percentage`, `amount`, `availability` FROM `Product` WHERE `archive`=0 ORDER by categoryId ') or die ("erreur in preparing select request");

			$req->execute() or die ("executing request error ");

			$req->bind_result($id,$name,$gender,$categoryId,$price,$inPromotion,$percentage,$availability,$amount) or die ("binding request error");
			$req->fetch();

			while($req->fetch())
				{	
					
					$conn1 = new mysqli($servername, $username, $password, $db);
					$req1 = $conn1->prepare('SELECT `name` FROM `Category` WHERE id=? ') or die ("erreur in preparing select request");
					$req1->bind_param('i',$categoryId);

					$req1->execute();

					$req1->bind_result($nameCategorie);



					while($req1->fetch())
					{
						continue;	
					}
					$conn2 = new mysqli($servername, $username, $password, $db);

					$req1 = $conn2->prepare('SELECT `content` FROM `Picture` WHERE idProvider=? and tableName="Product"') or die ("erreur in preparing select request");
					$req1->bind_param('i',$id);

					$req1->execute();

					$req1->bind_result($content);

					while($req1->fetch())
					{
						continue;	
					}




					echo "<tr>";
					
					echo "<td> <img src='data:image/jpeg;base64,".base64_encode( $content )."' style='width:120px;heigth:120px;'/></td>";
					echo "<td>".$name."</td>";
					echo "<td>".$nameCategorie."</td>";
					if ($gender=='o') 
							$gender='Accessoires';
					else
						{
						if ($gender=='w') 
							$gender='women';
						if ($gender=='m') 
							$gender='men';
						else
							$gender='children';

						}


					echo "<td>".$gender."</td>";
					echo "<td>".$price."</td>";
					echo "<td>".$inPromotion."</td>";
					echo "<td>".$availability."</td>";
					echo "<td>".$amount."</td>";
				 	echo("<td><a href='viewProduit.php?id=".$id."'><button class='btn btn-secondary btn-sm btn-icon icon-left'>visiualiser produit </button></a>");
					if (isset($_SESSION['isAdmin']))
					{
						if ($_SESSION['isAdmin']!=False)
						{
							echo ("<a href='archiveProduit.php?id=".$id."'><button class='btn btn-danger btn-sm btn-icon icon-left'>archiver</button></a>");
							echo("<a href='modif_Produit.php?id=".$id."'><button class='btn btn-info btn-sm btn-icon icon-left'>modifier</button></a></td>");
						}
						

					}
					echo "</tr>";



				}

		?>
							
						</tbody>
					</table>
				</div>
</div>








<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Dispaly product per users</h3>
					
				</div>
			<div class="panel-body">

			<table class="table table-striped table-bordered" id="example-3">
						<thead>
							<tr class="replace-inputs">
								<th>Product ID</th>
								<th>Product Name</th>
								<th>price</th>

								<th>Sum of sells per product</th>
							</tr>
						</thead>
						<tbody>

					<?php
							require 'db.php';
							$req = $conn->prepare('SELECT sum(`sum`), `productId` from Command group by productId') or die ("erreur in preparing select request");

							$req->execute();

							$req->bind_result($sum,$id);


							while($req->fetch())
								{
									$conn1 = new mysqli($servername, $username, $password, $db);

									$req1 = $conn1->prepare('SELECT name,price from Product where id=?') or die ("erreur in preparing select request");

									$req1->bind_param('i',$id);
									$req1->execute();

									$req1->bind_result($name,$price);

									while ($req1->fetch()) {
										continue;
									}



									echo "<tr>";
									echo("<td>".$id."</td>");

									echo "<td>".$name."</td>";
									echo "<td>".$price."</td>";
									echo "<td>".$sum."</td>";
									echo "</tr>";

								}

					?>
						
						</tbody>
				
					</table>
		</div>			
	</div>



















<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Dispaly category</h3>
					
				</div>
			<div class="panel-body">

				<table class="table table-bordered table-striped" id="example-2">
						<thead>
							<tr>
								
								<th>Category ID</th>
								<th>Category Name</th>
								<th>Category Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						
						<tbody class="middle-align">

			<?php
			require 'db.php';
			$req = $conn->prepare('SELECT `id`, `name`, `description` FROM `Category` where archive=0') or die ("erreur in preparing select request");

			$req->execute();

			$req->bind_result($id,$name,$description);


			while($req->fetch())
				{
					echo "<tr>";
					echo "<td>".$id."</td>";
					echo "<td>".$name."</td>";
					echo "<td>".$description."</td>";
					echo ("<td><center><a href='archiveCategorie.php?id=".$id."'><button class='btn btn-danger btn-sm btn-icon icon-left'>archiver</button></a>");
					echo("&nbsp;<a href='modif_Categorie.php?id=".$id."'><button class='btn btn-info btn-sm btn-icon icon-left'>modifier</button></a></center></td>");
					echo "</tr>";

				}

		?>

						
							
							
							
						</tbody>
					</table>
		</div>
	</div>
















<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Most active users</h3>
					
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped" id="example-4">
						<thead>
							<tr>
								<th>User ID</th>
								<th>User Name</th>
								<th>User Email</th>
								<th>User phone</th>
								<th>User address</th>
							</tr>
						</thead>
					 
			
					 
						<tbody>



						<?php
							require 'db.php';
							$req = $conn->prepare('SELECT id,name,email,phoneNumber,address from user where status="user" group by id HAVING id in (select userId from Command)') or die ("erreur in preparing select  user request");

							$req->execute();

							$req->bind_result($id,$username,$email,$phoneNumber,$address);


							while($req->fetch())
								{
									



									echo "<tr>";
									echo("<td>".$id."</td>");

									echo "<td>".$name."</td>";
									echo "<td>".$email."</td>";
									echo "<td>".$phoneNumber."</td>";
									echo "<td>".$address."</td>";
									echo "</tr>";

								}

					?>

						</tbody>
					</table>
					
				</div>
			</div>



	<!-- Bottom Scripts -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/TweenMax.min.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/xenon-api.js"></script>
	<script src="assets/js/xenon-toggles.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/xenon-custom.js"></script>

</body>
</html>

<?php


}
else
{
	header("location:../");
}
?>