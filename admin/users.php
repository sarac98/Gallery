<?php include("includes/header.php"); ?>
<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>



<?php

$users=user::Find_All();



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
                            Users
                            
                        </h1>
                        <a href="add_user.php" class="btn btn-primary">Add User</a>

                        <div class="col-md-12">
                        <table class="table table-hover">
                             
                            <thead>
                                <tr>
                                   
                                    <th>Id</th>
                                    <th>user</th>
                                    <th>username</th>
                                    <th>Firstname</th>
                                    <th>LastName</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user) : ?>
                                    
                                
                                
                               <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><img class="admin-user user-image" src="<?php echo $user->Image_Path_And_Placeholder(); ?>" alt="">
                                    </td>
                                    
                                    <td><?php echo $user->username; ?>
                                    <div class="action_links">
                                            
                                            <a href="delete_user.php?id=<?php echo $user->id;?>"> Delete </a>
                                            <a href="edit_user.php?id=<?php echo $user->id;?>"> Edit </a>
                                            
                                            
                                            
                                            </div>
                                
                                
                                </td>
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>
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