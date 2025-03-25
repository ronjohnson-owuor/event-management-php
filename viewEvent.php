<?php
require 'classes/db1.php';
require 'utils/sendEmail.php';
if(isset($_GET['register_event'])){
    $id = $_COOKIE['event_id'];
    $usn = $_COOKIE['usn'];
    

    if(empty($id)){
        echo "<script> alert('unable to register you for the  event')</script>";
        header('Location: /usn.php');
        return;
        
    }

    if( empty($usn)){

        echo "<script> alert('unable to register you for the  event please login first')</script>";
        header('Location: /usn.php');
        return;

    }

    $query = "INSERT INTO registered (usn,event_id) VALUES ('$usn','$id')";
    if(mysqli_query($conn,$query) === TRUE){
        $emailService = new EmailService();
        echo $usn;
        $statement = "SELECT email 
FROM participent 
WHERE usn = '$usn' 
LIMIT 1;
";
$email=null;
$result= mysqli_query($conn,$statement);

if($result && mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $email=$row['email'];
}

if(empty($email)){
    echo "<script> alert('event registered successfully redirecting to dashboard but email not sent.')</script>";
        header('Location: /RegisteredEvents.php');
}else{
   $emailService->sendBookingEmail($email);
        echo "<script> alert('event registered successfully redirecting to dashboard')</script>";
        header('Location: /RegisteredEvents.php');
        exit(); 
}

        
    }else{
        echo "<script> alert('unable to register you for the  event')</script>";
        header('Location: /viewEvent.php?id='.$id);
    }
}
?>

<?php
$id=$_GET['id'];
if($id){
    setcookie("event_id",$id);
}
$result = mysqli_query($conn,"SELECT * FROM events,event_info ef,student_coordinator s,staff_coordinator st WHERE type_id = $id and ef.event_id=events.event_id and s.event_id=events.event_id and st.event_id=events.event_id  ");

?>


<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>events360</title>
        <title></title>
        <?php require 'utils/styles.php'; ?>
        
    </head>

    <body>
   
    
        <?php require 'utils/header.php'; ?>
       
        <div class = "content">
            <div class = "container">
                <div class = "col-md-12">
                   

            </div>
       
         
            <?php
                if (mysqli_num_rows($result) > 0) {

                 $i=0;
                while($row = mysqli_fetch_array($result)) {
             
                include 'events.php';  
                
                $i++;
                    }
           ?>
<div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>
        <?php }?>
            <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
        </div>

     
        <?php require 'utils/footer.php'; ?>
    </body>
    
</html>