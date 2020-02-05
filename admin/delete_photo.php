<?php include("includes/init.php"); ?>

<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>
<?php

if(empty($_GET['id'])){
    header("Location: photos.php");
}

$user = Photo::Find_By_Id($_GET['id']);

if($user){

    $user->Delete_Photo();
    header("Location: photos.php");
}else {
    header("Location: photos.php");
}

?>

 