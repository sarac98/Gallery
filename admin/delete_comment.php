<?php include("includes/init.php"); ?>

<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>
<?php
echo $_GET['id'];
if(empty($_GET['id'])){
    header("Location: comments.php");
}

$comment = Comment::Find_By_Id($_GET['id']);

if($comment){

    $comment->Delete();
    header("Location: comments.php");
}else {
    header("Location: comments.php");
}

?>