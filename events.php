<div class="container">
            <div class="col-md-12">
            <hr>
            </div>

<div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-6">
                             

                          <img src=" <?php  echo $row['img_link'];?>" class="img-responsive">
                        </div> 
                        <div class="subcontent col-md-6">                        
                            <h1 style="color:white ; font-size:38px ;" ><u><strong><?php echo '<td>' . $row['event_title'] . '</td>';?></strong></u></h1>
                            <p style="color:white  ;font-size:20px ">
                            <?php
                            
                           
                            echo 'Date:' . $row['Date'] .'<br>'; 
                            echo 'Time:' . $row['time'] .'<br>'; 
                            echo 'Location:' . $row['location'] .'<br>'; 
                            echo 'Student Co-ordinator:' . $row['st_name'] .'<br>'; 
                            echo 'Staff Co-ordinator:' . $row['name'] .'<br>'; 
                            echo 'Event Price:' . $row['event_price'].'<br>' ;
                    
                        ?>
                            </p>
                            
                            <br><br>
                        <?php echo
                             '<a href="?register_event"  class="btn btn-default" > <span class="glyphicon glyphicon-circle-arrow-right"></span>register</a>'
                            ?>
                     </div>
                    </div>
                </section>
</div>
 </div>