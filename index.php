<?php
    $insert = false;
    if(isSet($_POST['name'])){
        // Set Variables 
        $server = "localhost";
        $user = "root";
        $password = "";
        
        // Create Connection 
        $con = mysqli_connect($server, $user, $password);
        if(!$con){
            die("Connection to this database is failed".mysqli_connect_error());
        }
        // echo "DB connected"

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $other = $_POST['desc'];

        // Create Query 
        $sql = "INSERT INTO `trip`.`student` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

        if($con -> query($sql) == true){
            // echo "Successfully Inserted";
            $insert = true;
        }else{
            // echo "Error $sql <br /> $con->error";
        }

        // Close Connection 
        $con->close();
        // echo $sql;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <img src="bg.jpg" alt="background" class="bg" />
    <div class="container">
        <h1>Welcome to Institue</h1>
        <p>Enter your details to confirm your participation in the trip</p>
        <?php
            if($insert == true){
                echo "<p class='submited'>Thanks for submitting your form</p>";
            }
        ?>
        
        <!-- <p class="submited">Thanks for submitting your form</p> -->
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email ID">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Description"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>

    <script src="index.js"></script>

    <!-- INSERT INTO `student` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testName', '20', 'Male', 'test@mail.com', '1234567890', 'This is an PHP admin message', current_timestamp()); -->
</body>

</html>