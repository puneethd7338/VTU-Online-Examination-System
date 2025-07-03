<?php
session_start();
include("db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
   // Retrieve form data
   $USN = $_POST['USN'];
   $Semester = $_POST['Semester'];
   $Branch = $_POST['Branch'];
   $Phone = $_POST['Phone'];
   $Email = $_POST['Email'];
   $Password = $_POST['Password'];

   // Basic validation (you should add more validation based on your requirements)
   if (!empty($USN) && !empty($Semester) && !empty($Branch) && !empty($Phone) && !empty($Email) && !empty($Password)) 
  
  {
   
       $query="insert into vtu (USN,Semester,Branch,Phone,Email,Password)values('$USN','$Semester','$Branch','$Phone','$Email','$Password')";
       mysqli_query($conn,$query);
       echo"<script type ='text/javascript'>alert('Successfully Registered')</script>";
   }
   else
   {
       echo"<script type ='text/javascript'>alert('Please Enter some Valid Information')</script>";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>

<form   method="POST">
    <h2>Signup to Online Examination System</h2>
    <label for="USN">USN:</label>
    <input type="text" id="USN" name="USN" placeholder="Enter your USN" required>

    <label for="Semester">Semester:</label>
    <input type="text" id="Semester" name="Semester" placeholder="Enter your Semester"required>

    <label for="Branch">Branch:</label>
    <input type="text" id="Branch" name="Branch" placeholder="Enter your Branch"required>

    <label for="Phone">Phone:</label>
    <input type="tel" id="Phone" name="Phone"  placeholder="Enter your Phone"required>

    <label for="E-mail">E-mail:</label>
    <input type="E-mail" id="Email" name="Email" placeholder="Enter your E-mail"required>

    <label for="Password">Password:</label>
    <input type="Password" id="Password" name="Password"placeholder="Enter your Password" required>

    <input type="Submit" id="Submit" name="Submit"  required>

    <p>By clicking the Signup button,you agree to our<br>
        <a href="">Terms and Condition</a> and <a href="#">Privacy Policy</a>
        </p>
        <p>Already have an account?<a href="Login.php">Login here</a></p>
                
</form>

</body>
</html>
