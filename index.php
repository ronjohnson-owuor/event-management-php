<?php 
require __DIR__.'/vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv ->load();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>event management</title>
        <?php require 'utils/styles.php';?>
            </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class = "content">
            <div class = "container">
                <div class = "col-md-12 events">
                    <h1 style="color:orangered; font-size:40px ; font-style:bold "><strong> Event Categories</strong></h1>

            </div>
            
            <div class="container">
            <div class="col-md-12">
                <hr>
            </div>
            </div>
           
            <div class="box-wrapper">

            <!-- TODO:: retrieve events from the database and display them here -->
             <?php 
             require "./classes/db1.php";
              $statement = "SELECT * FROM category";
              $categories=[];
              
              $result = mysqli_query($conn,$statement);
              if(!$result){
                echo "no event category at the moment, check back later";
              }
              while( $row = mysqli_fetch_assoc($result)){
                $categories[]= $row;
              }

                foreach ($categories as $category) { 
                ?>
                    <div class="event_wrapper">
                        <section>
                            <div class="event_box">
                                <div>
                                    <img src="<?php echo $category['image_url']; ?>" class="img-responsive">
                                </div>
                                <div class="subcontent col-md-6">
                                    <h1 style="color:#3e3e3e; font-size:25px;">
                                        <strong><?php echo $category['name']; ?></strong>
                                    </h1>
                                    <p>
                                    <?php echo $category['description']; ?>
                                    </p>
                                    <br><br>
                                    <a class="btn" style="background:orangered; color:white;" href="viewEvent.php?id=<?php echo $category['id']; ?>">
                                        <span class="glyphicon glyphicon-circle-arrow-right"></span> View <?php echo $category['name']; ?> events
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>
                <?php 
                } 
                ?>
            </div>
        </div>
  
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>