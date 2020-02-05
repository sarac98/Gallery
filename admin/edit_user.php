<?php include("includes/header.php"); ?>
<?php if(!$session->IsSingedIn()){
    header("Location: login.php");
}
?>



<?php

if(empty($_GET['id'])){
    header('Location: users.php');
} else { 


    
}

    $user= User::Find_By_Id($_GET['id']);
     
     if(isset($_POST['update'])){
     
        if($user){
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            if(empty($_FILES['user_image'])){
                $user->Save();
            }else {
                 $user->Set_File($_FILES['user_image']);
                 $user->Upload_Photo();
                 $user->Save();

                 header("Location: edit_user.php?id={$user->id}");
            }

           


           
           
        }
    }








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
                   
                    <div class="col-lg-8">
                        <h1 class="page-header">users

                        <small>Subheading</small>
                        </h1>

                        <div class="col-md-6">
                        <img class="img-responsive" src="<?php echo $user->Image_Path_And_Placeholder(); ?>" alt=""></img>


                        </div>
                        <form action="" method="post" enctype="multipart/form-data">


                        

                        <div class="col-md-6">
                        <div class="form-group">
                    
                    <input type="file" name="user_image">
                    </div>

                    <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $user->username?>">
                    </div>

                    

                    <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name?>">
                    
                    </div>


                    <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name?>">
                    
                    </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $user->password?>">
                    
                    </div>

                    <div class="form-group">
                    <a class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id?>">Delete</a>
                    <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
                    
                    
                    </div>

                    
                 


                        </div>
                       
                           

                        </div>
                        
                    </div>
                    </form>
                  
                </div>
              
                
                <!-- /.row -->

            </div>
          
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>