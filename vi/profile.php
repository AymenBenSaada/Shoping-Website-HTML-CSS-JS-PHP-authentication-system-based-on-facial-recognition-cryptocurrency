<?php
session_start();
require 'db.php';
if ($_SESSION['connect']!=1)
{

	header("Location: ../index.html");

}
else
{
$req = $conn->prepare('SELECT `content` FROM `Picture` WHERE idProvider=? and tableName="Product"') or die ("erreur in preparing select request");
$req->bind_param('i',$id);

$req->execute();

$req->bind_result($content);	
while ($req->fetch()) {
	continue;
}

?>

<img src='data:image/jpeg;base64,<?php echo base64_encode($content );?>' />
<?php
}
?>