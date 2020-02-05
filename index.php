<?php include("includes/header.php"); ?>


<?php


$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$items_per_page = 4;

$items_total_count = Photo::Count_All();



$photos= Photo::Find_All();





?>
        <div class="row">

          
            <div class="col-md-12">
            <div class="thumbnails row">
           
           <?php foreach ($photos as $photo):?>
          
          
          
          <div class="col-xs-6 col-md-3">
          
          <a class="thumbnail" href="photo.php?id=<?php echo $photo->id?>"> 
          <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->Picture_Path();?>" alt="">
          
          
          </a>
          
          </div>
          
          
          
          
         
            
          
           <?php endforeach;?>
           </div>
            </div>





            
            <!--<div class="col-md-4">

            
                 // include("includes/sidebar.php"); 



        </div>
    

        <?php include("includes/footer.php"); ?>
