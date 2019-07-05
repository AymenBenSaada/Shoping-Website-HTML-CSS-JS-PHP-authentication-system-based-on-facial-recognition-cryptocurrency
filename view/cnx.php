<?php
    //preventing xss attack
session_start();

//import db paramaters
require "db.php";

//destroying session
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
    //hashing password
    $password=md5($password);
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
                //check if this connexion is for an admin or for a user
                if ($status==="admin")
                {
                    $_SESSION['isAdmin']=TRUE;
                    echo $_SESSION['isAdmin'];
                }
                header("Location: profile.php",true) ;
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
            height: 400px;
            width: 350px;
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
        .login_btn {
            width: 100%;
            background: #DC143C !important;
            color: white !important;
        }
        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .login_container {
            padding: 0 2rem;
        }
        .input-group-text {
            background: #DC143C !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
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
                    <form method='POST' action=''>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control input_user"  placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass"  placeholder="password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">remember password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                    <input name='submit' type="submit"  class="btn login_btn" value='Connexion'>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        You don't have an account? <a href="inscrit.php" class="ml-2">Register</a>
                    </div>
                   
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
