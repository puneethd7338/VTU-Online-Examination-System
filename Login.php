<?php
session_start();
include("db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $USN = $_POST['USN'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    if (!empty($USN) && !empty($Email) && !empty($Password))
    {
        $query = "SELECT * FROM vtu where Email='$Email'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
               if( $user_data['Password']==$Password)
               {
                header ("location:index.php");
                die();
               }
            }
        }
        echo"<script type ='text/javascript'>alert('Login Successfully')</script>";
    }
    else{

    echo"<script type ='text/javascript'>alert('Please Enter some Valid Information')</script>";
    } 
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form  method ="POST">
    <h2>Login to Online Examination System</h2>
    <label for="USN">USN:</label>
    <input type="text" id="USN" name="USN"placeholder="Enter your USN" required>

    <label for="Email">E-mail:</label>
    <input type="Email" id="Email" name="Email" placeholder="Enter your E-mail"required>
    <label for="Password">Password:</label>
    <input type="text" id="Password" name="Password"placeholder="Enter your Password" required>
    <input type="Submit" id="Submit" name="Submit"  required>

        <p>Not have an account?<a href="Signup.php">Signup here</a></p>     
</form>

</body>
</html>
