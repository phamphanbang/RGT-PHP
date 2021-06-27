<?php 
    session_start();
    require_once "../connection/connection.php"; 

    
    if(isset($_POST["login"])) {
    $useremail=$_POST["email"];
    $password=$_POST["password"];
    $query="select * from user where user_email='$useremail' and user_password='$password' ";
    $result=mysqli_query($con,$query);
    if (mysqli_num_rows($result)>0) {
        while ($row=mysqli_fetch_array($result)) {
            if ($row["user_role"]=="admin")
            {
                $_SESSION['LoginAdmin']=$row["id"];
                header('Location: ./public/home.php');
            }
            else if ($row["Role"]=="user" )
            {
                $_SESSION['LoginUser']=$row["id"];
                header('Location: ./public/home.php');
            }
        }
    }
    else
    { 
        header("Location: login.php");
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="POST" class="btn-container">
        <div class="row btn-group">
            <div class="col">
                <label for="first">Email</label>
                <input type="text" name="email" id="email" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
            </div>
        </div>
        <div class="row btn-group">
            <div class="col">
                <label for="second">Password</label>
                <input type="password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
            </div>
        </div>
        <div class="row btn-group">
            <div class="col">
                <input type="submit" name="login" id="login" value="LOGIN">
            </div>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>