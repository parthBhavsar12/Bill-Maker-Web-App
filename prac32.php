<!DOCTYPE html>
<html>
<head>
    <title>LOG IN</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style32.css"> 
</head>
<body>
<?php
    session_start();
        if (isset($_GET['action']))
        {
            if($_GET['action']='logOut')
            {
                session_destroy();
            }
        }
?>
<h1>LOG IN</h1>
    <form action="log_in_action.php" method="post">
        <table>
            <tr><td><input type="text" name="user_name" placeholder="Enter Username" title="User Name" autofocus required 
            value="<?php 
                        if (isset($_COOKIE['user_name']))
                            echo $_COOKIE['user_name'];
                    ?>"          
            /></tr></td>
            <tr><td><input type="password" name="password" placeholder="Enter Password" title="Password" required/></tr></td>
            <tr><td><input type="checkbox" name="rememberMe" value="remember" id="remember"  title="Remember Me"/>Remember Me</tr></td>
            <tr><td><input type="submit" name="submit" value="LOG IN" title="Get Logged In"/></tr></td>
        </table>
    </form>
    <p>Haven't any Account? <a href="register.php" title="Register Yourself">Sign Up</a></p>
    <p><a href="forgot_password.php"  title="Reset Password">Forgot Password?</a></p>
</body>
</html>