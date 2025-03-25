<?php
if(isset($_POST['login'])){
    
    $usn = trim(strtolower($_POST['usn']));
    $email = trim(strtolower($_POST['email']));

    if(empty($usn)){
        echo "<script>alert('admission is empty')</script>";
        header('Location: usn.php');
        return;
    }

    if(empty($email)){
        echo "<script>alert('email is empty')</script>";
        header('Location: usn.php');
        return;

    }

    require 'classes/db1.php';
    $statement =   "SELECT * FROM participent where email='$email' AND usn='$usn'";
    $result = mysqli_query($conn,$statement);
    if(mysqli_num_rows($result) <=0){
        echo "<script>alert('user not found please register')</script>";
    }else{
        setcookie('usn',$usn,time()+(1086*30),'/');
        header("Location: /RegisteredEvents.php");
    }


}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>events 360</title>
        <title></title>
        <?php require 'utils/styles.php'; ?>
        
    </head>
    <body>
        <?php require 'utils/header.php'; ?>

        <div class ="content">
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                    <form class ="form-group" method="POST">

                        
                        <div class="form-group">
                            <label for="usn"> Student USN: </label>
                            <input type="text"
                                   id="usn"
                                   name="usn"
                                   class="form-control">
                                   <label for="usn"> email: </label>
                                   <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control">
                        </div>
                        <button type="submit" name="login" class = "btn btn-default">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
