<?php require_once("includes/header.php");
?>

<?php
if($session->IsSingedIn()){
    header("Location: index.php");
}

if(isset($_POST['submit'])){

$username = trim($_POST['username']);
$password = trim($_POST['password']);



$user_found = user::Verifyuser($username,$password);




if($user_found) {
    $session->LogIn($user_found);
    header("Location: index.php");
}
else {
    $the_message = "Your password or username are incorrect!";
}
}
else {
    $username="";
    $password="";
    $the_message="";
}




?>


<div class="col-md-4 col-md-offset-3">


<form action="" method="post">	
<div class="form-group">
	<label for="username">username</label>
	<input type="text" class="form-control" name="username" value=<?php echo htmlentities($username); ?>>

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value=<?php echo htmlentities($password); ?>>
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>
<h4 class="bg-danger"><?php echo $the_message; ?></h4>
</div>



