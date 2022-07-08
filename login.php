<?php
session_start();
$_SESSION['user']='';
$_SESSION['userId']='';
include 'auth/config.php';
$conn = connect();
if (isset($_POST['submit'])) {
    $uName = $_POST['uName'];
    $password = $_POST['password'];

        $sql = "SELECT * FROM  users_info WHERE uName = '$uName' and password = '$password'";
        $request = mysqli_query($conn, $sql);
        if(mysqli_num_rows($request) ==1){
            $user=mysqli_fetch_assoc($request);
            $_SESSION['user'] = $user['name'];
            $_SESSION['userId'] = $user['id'];
            
            header("Location:dashboard.php");
        } else {
            echo "Login Info Mismatch: " . mysqli_error($conn);
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Personal Info:</legend>
            <div class="container form-group">
                <h1>Registation Form</h1>
                <!-- Email input -->
                <div>
                    <label>Your Username</label>
                    <input type="text" class="form-control" name="uName" id="uName" placeholder="Enter Your User Name" required>
                </div>
                <div>
                    <label>Your Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>
                </div><br>

                <!-- Submit button -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="register.php">Register</a></p>
                </div>
            </div>
        </fieldset>
    </form>

</body>

</html>