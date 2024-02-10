<?php
$insert=false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server,$username,$password);
if (!$con) {
   die("Connection to this database failed due to" .mysqli_connect_error());
}

$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql="INSERT INTO `trip`.`us-trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
      VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());
";

if ($con->query($sql)==true) {
 $insert=true;
}else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <img src="/bg.jpg" alt="">  
  <div class="container">
      <h1>Welcome to IIT Kharagpur Us trip form</h1>
      <p>
        Enter your details and submit this form to confirm your participation in
        the trip
      </p>
      <?php
      if ($insert==true) {
        # code...
        echo "<p>
           Thanks for submitting your form.We are happy to see you joining us for
           the Us trip
         </p>";
      }
      ?>

      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
        <input type="text" name="age" id="age" placeholder="Enter your Age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter your Gender"
        />
        <input
          type="text"
          name="email"
          id="email"
          placeholder="Enter your Email"
        />
        <input
          type="phone"
          name="phone"
          id="phone"
          placeholder="Enter your Phone"
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter any other information"
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
  </body>
</html>
<!-- INSERT INTO `us-trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '22', 'female', 'this@gmail.com', '9999999999', 'this is test infor', current_timestamp()); -->

