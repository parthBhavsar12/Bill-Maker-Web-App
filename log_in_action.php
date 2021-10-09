<!DOCTYPE html>
<html>
<head>
    <title>LOG IN ACTION</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style32.css"> 
</head>
<body>
    <?php
        session_start();
        $user = $_POST['user_name'];
        $con = mysqli_connect("localhost","root","","mini_project_sem_5");
        if(!mysqli_connect_errno())
        {       
            $sql = "SELECT * FROM register WHERE username='$user'";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result))
            {
                $password = $row['password'];
            }
            // $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            if(isset($_POST['rememberMe']))
            {
                if(password_verify($_POST['password'],$password))
                {
                    setcookie('user_name',$user,time()+3600*24);
                    $_SESSION['user_name'] = $user;
                    header("Location:home.php");
                }
            }
            elseif(password_verify($_POST['password'],$password))
            {
                $_SESSION['user_name'] = $user;
                header("Location:home.php");
            }
            else
            {
                echo "<h1>Error....!</h1>";
                echo "<table><tr><td><p>Wrong User ID or Password....!</p></td></tr><tr><td>
                <p>Please try again....!</p></td></tr></table>";
                echo "<a onclick='history.back()'>Go Back</a>";
            }
        }
    ?> 
</body>
</html>