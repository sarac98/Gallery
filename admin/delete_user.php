<?php include("includes/init.php"); ?>

<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>
<?php

if(empty($_GET['id'])){
    header("Location: users.php");
}

$user = User::Find_By_Id($_GET['id']);

if($user){

    $user->Delete();
    header("Location: users.php");
}else {
    header("Location: users.php");
}

?>