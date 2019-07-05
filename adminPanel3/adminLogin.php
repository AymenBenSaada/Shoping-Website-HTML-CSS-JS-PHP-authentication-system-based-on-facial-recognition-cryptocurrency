<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="boutiquna Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>boutiquna - Login </title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/xenon-core.css">
	<link rel="stylesheet" href="assets/css/xenon-forms.css">
	<link rel="stylesheet" href="assets/css/xenon-components.css">
	<link rel="stylesheet" href="assets/css/xenon-skins.css">
	<link rel="stylesheet" href="assets/css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <style type="text/css">

        #results { padding:20px; border:1px solid; background:#ccc; }

    </style>

	<script src="assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body login-page login-light">

	
	<div class="login-container">
	
		<div class="row">
		
			<div class="col-sm-6">
			
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						
						
						// Validation and Ajax action
						$("form#login").validate({
							rules: {
								username: {
									required: true
								},
								
								passwd: {
									required: true
								}
							},
							
							messages: {
								username: {
									required: 'Please enter your username.'
								},
								
								passwd: {
									required: 'Please enter your password.'
								}
							},
							
							
						});
						
						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
				<!-- Errors container -->
				<div class="errors-container">
				
									
				</div>
				
				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="POST" role="form" id="login" action='' class="login-form fade-in-effect">
					
					
	
					
					<div class="form-group">
						<label class="control-label" for="username">Email</label>
						<input type="email" class="form-control" name="email" id="username" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control" name="password" id="passwd" autocomplete="off" />
					</div>
					
						<input type="submit" class="form-control"  name='submit'>
							<i class="fa-lock"></i>
							Log In

				</form>

			</div>
			
		</div>
		
	</div>
				<a href="main.php" >submit</a><!--bech ken saret probleme f redirection wa9t li nsawer nredirecti hné -->


	<!-- Bottom Scripts -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/TweenMax.min.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/xenon-api.js"></script>
	<script src="assets/js/xenon-toggles.js"></script>
	<script src="assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="assets/js/toastr/toastr.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/xenon-custom.js"></script>








<div class="container">

    <h1 class="text-center">Capture webcam image </h1>

   

    <form method="POST" action="#">

        <div class="row">

            <div class="col-md-6">

                <div id="my_camera"></div>

                <br/>

                <input type=button value="Take Snapshot" onClick="take_snapshot()">

                <input type="hidden" name="image" class="image-tag">

            </div>

            <div class="col-md-6">

                <div id="results">Your captured image will appear here...</div>

            </div>

            <div class="col-md-12 text-center">

                <br/>

                <button class="btn btn-success">Submit</button>

            </div>

        </div>

    </form>

</div>

  

<!-- Configure a few settings and attach camera -->

<script language="JavaScript">

    Webcam.set({

        width: 490,

        height: 390,

        image_format: 'jpeg',

        jpeg_quality: 90

    });

  

    Webcam.attach( '#my_camera' );

  

    function take_snapshot() {

        Webcam.snap( function(data_uri) {

            $(".image-tag").val(data_uri);

            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

        } );

    }

</script>











</body>
</html>
<?php

	//preventing xss attack

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



				echo $status;
				//check if this connexion is for an admin or for a user
				if ($status==="admin")
				{
					$_SESSION['isAdmin']=TRUE;
					echo $_SESSION['isAdmin'];
				}
				header("Location: main.php");
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
    <meta charset="UTF-8">
    <meta HTTP-EQUIV="content-language" content="FR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="revisit-after" content="7 days">
    <meta name="robots" content="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">


<?php


    use Google\Cloud\Vision\VisionClient;


    // On chage composer
    require_once 'vendor/autoload.php';


    // On récupère l'image à scanner
   // $file = $_FILES["image"];


    // On déplace l'image dans le dossier de traitement
    //move_uploaded_file($file['tmp_name'], __DIR__ . "/export/image.jpg");


//capturer l'image
    $img = $_POST['image'];
    $folderPath = "upload/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);



    // Utilisation de l'API Google Cloud Vision
    $vision = new VisionClient([
        'keyFilePath' => __DIR__ . "/keyFile.json",
    ]);

    // Lecture de l'image
    $image = $vision->image(
        fopen(__DIR__ . "/export/image.jpg", "r"),
        ['FACE_DETECTION'] // Ici nous voulons chercher des visages, mais il est possible de rechercher d'autres types
    );

    // Récupération des résultats
    $annotation = $vision->annotate($image);

    // On parcourt les visages trouvés
    // Et comme nous allons écrire sur l'image, nous devons en créer une nouvelle
    $output = imagecreatefromjpeg(__DIR__ . "/export/image.jpg");

    foreach ($annotation->faces() as $face) {
        $vertices = $face->boundingPoly()['vertices'];

        $x1 = $vertices[0]['x'];
        $y1 = $vertices[0]['y'];
        $x2 = $vertices[2]['x'];
        $y2 = $vertices[2]['y'];

        imagerectangle($output, $x1, $y1, $x2, $y2, 0x00ff00);
    }


    // Affichage de l'image à l'utilisateur
    header('Content-Type: image/jpeg');
    imagejpeg($output);
    imagedestroy($output);

?>


