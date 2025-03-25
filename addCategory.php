
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/category.css">
    <title>Add category</title>
</head>
<body>

    <form method="post">
    <h1>Add Event Category</h1>
    <input type="text" name="category_name" id="category_name" placeholder="category name">
    <input type="text" name="image_url" placeholder="image url">
    <textarea name="category_desc" id="category_desc" placeholder="event short description"></textarea>
    <button type="submit" name="add_category">add category</button>
    <a class="back" href="/adminPage.php">back</a>
  
    </form>

    
</body>
</html>

<?php
 include 'classes/db1.php';
if(isset($_POST["add_category"])){
    // save to the database
    $name = trim($_POST["category_name"]);
    $image_url = trim($_POST["image_url"]);
    $description =trim( $_POST["category_desc"]);


    // add to database
    if(!empty($name) && !empty($image_url) && !empty($description)){
        $statement = "INSERT INTO category(name,image_url,description) VALUES('$name','$image_url','$description');";
        if(mysqli_query($conn,$statement)){
            echo "<script>alert('data saved succesfully click the link below to go back to the admin page')</script>";

        }else{
            echo $conn -> error;
        }
    }else{
        echo "<script> alert('input name,image url or description cannot be null')</script>";
    }
}

?>