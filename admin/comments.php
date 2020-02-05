<?php include("includes/header.php"); ?>
<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>



<?php

$comments=Comment::Find_All();



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
                                    <a href="delete_comment.php?id=<?php echo $comment->id;?>"> Delete </a> 
                                    </div>
                                
                                
                                </td>
                                    <td><?php echo $comment->body; ?></td>
                                </tr>
                                <?php endforeach; ?>

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