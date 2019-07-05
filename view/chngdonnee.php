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
<html>

<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Robes</title>
  <!-- Font Awesome -->
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
<style type="text/css">
  .navbutton{
  display: inline-block;
  float: right;
  margin-left: 170px;
  margin-top: -150px;
  margin-right: -150px;
  color: black;
}

.donnee{
  height: 850px;
  width: 700px;
  margin-top: 50px;
  padding-top: 30px;
  padding-left: 40px;
  border:2px solid black;
}
.donnee h4{
  margin-top: 20px;
  margin-bottom: 30px;
}
.donnee p{
  margin-left: 30px;
}

  .signup_btn {

            width: 100%;
            background: gray !important;
            color: white !important;
        }
        .signup_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .signup_container {
         
            margin-left: -20px;
            width: 94%;
            padding: 0 2rem;
         

        }

</style>
</head>

<body>
  
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color" style=' height: 200px;background-color: rgb(300, 300, 240)!important;'>


 <a href="index.html"><img src="../img/logo.png" style=' height: 100px;width: 150px;  margin-left: 580px; margin-top: -50px;'></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">
<div>
    <!-- Links -->
    <ul class="navbar-nav mr-auto" style="margin-top: 130px;">
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" style="color: black; margin-left: -700px; ">Catégories</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" style="margin-left: -700px; ">
          <a class="dropdown-item" href="femme.html">Femme</a>
          <a class="dropdown-item" href="homme.html">Homme</a>
          <a class="dropdown-item" href="enfant.html">Enfant  </a>
          <a class="dropdown-item" href="accessoires.html">Accessoires  </a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.html" style="color: black; margin-left: -250px;">Accueil
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="promotions.html" style="color: black; margin-left: -140px;">Promotions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nouveaute.html" style="color: black; margin-left: -10px;">Nouveautés</a>
      </li>

    </ul>
    </div>
    <!-- Links -->

   <a  href="compte.html"  class="navbutton">
        
      <i class="fas fa-user-circle" ></i>
      Compte
    </a> 

    <a href="favoris.html"  class="navbutton"  >
      <i class="fas fa-heart"></i>    
      Favoris
    </a> 

<a href="panier.html" class="navbutton">
      <i class="fas fa-shopping-bag"> </i>  
      Panier
    </a> 
    

    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Recherche" aria-label="Search" id='search' style="margin-top: 110px;">
      </div>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>

<div class="container donnee">

      <h4><b>Données personnelles</b></h4>
    


   <div style=" height: 800px;width: 700px; ">
            <form class="form-horizontal" method="post" name="signup" id="signup" enctype="multipart/form-data" >        
        <div class="form-group">
          <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input type="email" name="email" class="form-control"   placeholder="type your mail"  value='<?php echo $email; ?>'>
            </div>
            </div>
        </div>
            <div class="form-group">
          <label class="control-label col-sm-3">Name <span class="text-danger">*</span></label>
            <div class="col-md-8 col-sm-9">
           <input type="text" class="form-control"  value='<?php echo($name); ?>' name="name" placeholder="type your name" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Password <span class="text-danger">*</span></label>
            <div class="col-md-8 col-sm-9">
           <input type="password" class="form-control"   name="password" placeholder="type your password" >
          </div>
        </div>
        
       
        <div class="form-group">
          <label class="control-label col-sm-3">Phone number <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input  type="text" value='<?php echo $phoneNumber; ?>' class="form-control" name="phoneNumber"  placeholder="+216 25 555 666" value="">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3">Address </label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" value='<?php echo $address; ?>' class="form-control" name="address" id="contactnum" placeholder="2080" value="">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3">Photo de profil<br></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
              <input type="file" name="image" id="file_nm" class="form-control upload" placeholder="" aria-describedby="file_upload">
            </div>
          </div>
        </div>
       <div class="d-flex justify-content-center mt-3 signup_container">
             <input name="s" type="submit" value="Modifier" class="btn signup_btn">
             <input type="reset" value="Annuler" class="btn signup_btn">
        </div>
        
      </form>
      <br>
        

      </div>
    </div>
</div>
</div>
                </div>
          
</div>



 <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>

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
      #header('refresh:5;url=../');

}

}
?>