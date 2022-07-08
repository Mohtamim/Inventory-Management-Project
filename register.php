<?php
    include 'auth/config.php';
    $conn=connect();
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $uName=$_POST['uName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $rPassword=$_POST['rPassword'];
        if($rPassword==$password){
            $sql="INSERT INTO `users_info`( `name`, `uName`, `email`, `password` ) VALUES ('$name','$uName','$email','$password')";
            $request = mysqli_query($conn, $sql);
            if($request==true){
                header("Location:login.php");
            }else{
                echo "Failed: ". mysqli_error($conn);
            }
        }else{
            echo "Password doesn't match";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/style.css">
</head>

<body>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="container form-group" >
            <h1>Registation Form</h1>
            <div>
                <label>Your Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name"  required class="form-control">
            </div>
            <div>
                <label>Your Username</label>
                <input type="text" class="form-control" name="uName" id="uName" placeholder="Enter Your User Name"  required>
            </div>
            <div>
                <label>Your Email</label>
                <input type="mail" class="form-control" name="email" id="email" placeholder="Enter Your Email"  required>
            </div>
            <div>
                <label>Your Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password"  required>
            </div>
            <div>
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="rPassword" id="rPassword" placeholder="Confirm Password"  required>
            </div>
            <div>
                <p><span>***</span>By Creating an account you agree to our Terms and Privacy.</p>
            </div>
            <div>
                <input type="submit" class="form-control" name="submit" id="submit" value="Submit">
            </div>
            <div>
                <p>Already Have  an Account?<a href="login.php">Login Here</a></p>
            </div>
        
        </div>
    </form>
</body>

</html>