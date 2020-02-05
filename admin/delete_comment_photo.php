<?php include("includes/init.php"); ?>

<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>
<?php

if(empty($_GET['id'])){
    header("Location: comments.php");
}

$comment = Comment::Find_By_Id($_GET['id']);

if($comment){

    $comment->Delete();
    header("Location: comment_photo.php?id={$comment->photo_id}");
}else {
    header("Location: comment_photo.php?id={$comment->photo_id}");
}

?>