<?php include("includes/header.php"); ?>
<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>



<?php

if(empty($_GET['id'])){

    header('Location: photos.php');
}

$comments= Comment::Find_Comments($_GET['id']);
$photo = Photo::Find_By_Id($_GET['id']);
?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           


           <?PHP include("includes/top_nav.php")?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           

           <?PHP include("includes/side_nav.php")?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
    <div class="container-fluid">
  
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            
                            
                        </h1>
                      

                        <div class="col-md-12">
                        <table class="table table-hover">
                             
                            <thead>
                                <tr>
                                   
                                    <th>Photo Id</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($comments as $comment) : ?>
                                     
                           
                              
                                                          
                              
                                
                                
                               <tr>
                               
                                    <td><?php echo $comment->photo_id; ?></td>
                                    </td>
                                    
                                    <td><?php echo $comment->author; ?>
                                    <div class="action_links">
                                    <a href="delete_comment_photo.php?id=<?php echo $comment->id;?>"> Delete </a> 
                                    </div>
                                
                                
                                </td>
                                    <td><?php echo $comment->body; ?></td>
                                </tr>
                               
                                <?php endforeach; ?>
                                <a class="thumbnail" href=""><img class="admin-photo-thumbnail" src="<?php echo $photo->Picture_Path();?>" alt=""></img></a>

                            </tbody>


                        </table>
                       




                    </div>
                </div>
                <!-- /.row -->

            </div>
        
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>