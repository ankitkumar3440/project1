<?php
$insert=false;
if(isset($_POST['name'])){
 //set connection variable//
$server="ec2-18-233-104-114.compute-1.amazonaws.com";
$username="vmpdxhzcexafrp";
$password="51b81b3c34fc0c47c43ec4f0f2d581398a79b2520b5f2ff893c497cbc9c91893";
$database="
dcr5ease1la214";
//check for connection sucess//
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("connection to this database failed due to". mysqli_connect_error());
}
//echo"sucess connecting to the db";
//collect post variable//
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql="INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender','$email', '$phone', '$desc', current_timestamp());";
//echo $sql;
if($con->query($sql)==true)
{
   // echo"sucessfully inserted";
   $insert=true;
}
else{
    echo "Error :$sql<br>$con->error";
}
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcom to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="college image-2.jpg" alt="RECABN" srcset="">
    <div class="container">
        <h3>Welcom to RECABN Travel form </h3>
        <p>enter the your detsails and submit this form for confirmation of your paricipant in this program</p>
        <?php
        if($insert==true){
      echo"<P class='submit'>Thanks for submiting the form</P>";
        }
?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name"></br>
            <input type="text" name="age" id="age " placeholder="enter your age"></br>
            <input type="text" name="gender" id="gender" placeholder="enter your gender"></br>
            <input type="email" name="email" id="email" placeholder="John@gmail.com"></br>
            <input type="phone" name="phone" id="phone" placeholder="enter your mobile no"></br>
            <textarea name="desc" id="desc" cols="30" rows="20" placeholder="enter other information here"></textarea></br>
            <button class="btn">submit</button>

            <!-- / <button class="btn">reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>

</body>

</html>
