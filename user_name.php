<!DOCTYPE html>
<html>
<head>
   <title>SET USERNAME</title>
   <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style32.css"> 
</head>
<body>
<?php
    if(isset($_POST['register']))
    {
        $con = mysqli_connect("localhost","root","","mini_project_sem_5");
        if(!mysqli_connect_errno())
        {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $mobile = $_POST['mobile'];
            $mail_id = $_POST['mail_id'];
            $username = $_POST['username'];
            $shopname = $_POST['shopname'];
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

            if($_POST['password'] == $_POST['confirm_password'])
            {
                $sql = "INSERT INTO register(`first_name`, `last_name`, `mobile`, `email`, `password`, `username`, `shopname`) VALUES ('$first_name','$last_name','$mobile','$mail_id','$password','$username','$shopname')";
                $result = mysqli_query($con,$sql);
                echo '
                <h1>USER NAME</h1>
                <table>
                    <tr><td><p>Your user-name has been saved as : '.$_POST["username"].'</p></tr></td>
                    <tr><td><p>Now, Get Logged In...!</p></tr></td>
                </table>
                <p> </p> <p> </p> 
                <a href="prac32.php">Click here to Log In</a>';
                $shop = "shop_".$_POST['shopname'];
                $shop = str_replace(' ','_',$shop);
                $con = mysqli_connect("localhost","root","","mini_project_sem_5");
                $sql = "CREATE TABLE $shop (
                    sr_no INT AUTO_INCREMENT,
                    item_name VARCHAR(50) NOT NULL,
                    PRIMARY KEY (sr_no))
                    ";
                mysqli_query($con,$sql);
        
// echo '
// <h1>SET USERNAME</h1>
// <marquee direction="left" behavior="alternate">Welcome, '.$_POST["first_name"].' '.$_POST["last_name"].'...! </marquee>
//     <form method="post" action="show_user_name.php">
//         <table>
//             <tr><td><input type="text" name="user_name" placeholder="Set Username" autofocus required/></tr></td>
//             <tr><td><input type="submit" name="submit" value="SAVE"/></tr></td>
//         </table>
//     </form>
// </body>
// </html>
// ';
            }
            else
            {
                echo "<table><tr><td>* Password and Confirm Password must be same</td></tr></table>
                <a onclick='history.back()'>Go Back</a>";
            }
        }
        else
        {
            echo "<table><tr><td>Database connection could not happen : ".mysqli_connect_error()."...Try Again...</td></tr></table>";
        }
    }
?>