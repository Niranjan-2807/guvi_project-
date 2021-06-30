<?php
$email = $_POST['email'];
$age = $_POST['age'];
$gender  = $_POST['gender'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];

if (!empty($age) || !empty($gender) || !empty($dob) || !empty($mobile) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "registration";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From updatedprofile Where email = ? Limit 1";
  $INSERT = "INSERT Into updatedprofile (email,age,gender,dob,mobile )values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sisii",$email,$age,$gender,$dob,$mobile);
      $stmt->execute();
      header("Location: home.html");


     } else {
      echo "the details are same";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>