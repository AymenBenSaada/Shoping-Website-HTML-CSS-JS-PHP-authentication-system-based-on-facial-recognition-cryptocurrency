<?php
if(isset($_SESSION['connect']))
{
  session_destroy();
}


?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
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
<style type="text/css">
        /* Coded with love by Mutiullah Samim */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #FFE4E1 !important;
        }
        .user_card {
            border:1px solid #FFA07A;
            height: 1050px;
            width: 550px;
            margin-top: 150px;
            margin-bottom: auto;
            background: white;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }
        .brand_logo_container {
            border:1px solid #FFA07A;
            position: absolute;
            height: 180px;
            width: 180px;
            top: -95px;
            border-radius: 50%;
            background: white;
            padding: 10px;
            text-align: center;
        }
        .brand_logo {
            margin-top: -5px;
            margin-left: 5px;
            height: 150px;
            width: 150px;
            border-radius: 25%;
           

        }

        .form_container {
            margin-top: 100px;
        }
        .signup_btn {

            width: 90%;
            background: #DC143C !important;
            color: white !important;
        }
        .signup_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .signup_container {

            margin-left: -20px;
            width: 77%;
            padding: 0 2rem;
         

        }
        
        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
</style>

</head>
<!--Coded with love by Mutiullah Samim-->
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../img/logo2.png" class="brand_logo" alt="Logo" >
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <div class="container">
    <div class="row">
    <div class="col-md-8">
      <section>      
        <div style=" height: 800px;width: 700px; ">
    <form method='POST' action='' name="f" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input type="email" class="form-control"  type="email" name="email" placeholder="type your mail" required>
            </div>
            </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3">Password<span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="password" id="password" placeholder="Entrer votre mot de passe" value="">
           </div>   
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col">Confirmer password<span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password"   class="form-control" name="confirmPassword" placeholder="confirm your password" required>
            </div>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Name <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
         <input type="text"   class="form-control" name="name" placeholder="type your name" required>
          </div>
        </div>
        
      
        <div class="form-group">
          <label class="control-label col-sm-3">PhoneNumber <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input  type="text" class="form-control" name="phoneNumber" placeholder="type your phone number"  >
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3">address  </label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input type="text" class="form-control" name="address" placeholder="type your address" required>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3">Picture<br></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
              <input type="file" name="image"class="form-control upload" placeholder="" aria-describedby="file_upload">
            </div>
          </div>
        </div>
       
          <div class="d-flex justify-content-center mt-3 signup_container">
             <input name="submit" type="submit" value="Inscription" class="btn signup_btn">
        </div>
      </form>
      <br>
      
      </div>
    </div>
</div>
</div>
                </div>
                
                
            </div>
        </div>
    </div>
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
      print '<script> alert("you have already an account please check your email");</script>';
      #header('refresh:5;url=../'); 
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
      print("<script> alert('succesful creating account ...');</script>");
      #header('url=../'); 


    }


}
?>