<!DOCTYPE html>
<html>
<head>
    <title>FORGOT PASSWORD</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style32.css">
</head>
<body>
    <h1>FORGOT PASSWORD</h1>
    <table>
        <form method="post">
            <tr><td><input type="text" name="user_name" placeholder="Enter Username" autofocus title="User Name" required/></tr></td>
            <tr><td><input type="password" name="new_password" placeholder="Enter New Password" title="New Password" required/></tr></td>
            <tr><td><input type="password" name="confirm_new_password" placeholder="Confirm New Password" title="Confirm New Password" required/></tr></td>
            <tr><td>* New Password and Confirm New Password must be same</td></tr>
            <tr><td><input type="submit" name="register" value="UPDATE PASSWORD" title="Update Password"/></tr></td>
        </form>
    </table>
    <?php
    if(isset($_POST['register']))
    {
        $con = mysqli_connect("localhost","root","","mini_project_sem_5");
        if(!mysqli_connect_errno())
        {
            if($_POST['new_password'] == $_POST['confirm_new_password'])
            {
                $user_name =  $_POST['user_name'];
                $new_password = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
                $sql = "UPDATE `register` SET `password`= '$new_password' WHERE username='$user_name'";
                mysqli_query($con,$sql);
                echo "
                <p>Your Password has been updated...</p>
                <p>Now, Get Logged In...!</p>
                <a href='prac32.php'>Click here to Log In</a>";
                }
            else
            {
                echo "<p>* New Password and Confirm New Password must be same</p>";
            }
        } 
        
    }
    ?>
</body>
</html>