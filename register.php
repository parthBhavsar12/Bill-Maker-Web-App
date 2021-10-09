<!DOCTYPE html>
<html>
<head>
   <title>SIGN UP</title>
   <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style32.css"> 
</head>
<body>
<h1>SIGN UP</h1>
    <form method="post" action="user_name.php">
        <table>
            <tr><td><input type="text" name="first_name" placeholder="Enter First Name" title="First Name" autofocus required/></tr></td>
            <tr><td><input type="text" name="last_name" placeholder="Enter Last Name" title="Last Name" required/></tr></td>
            <tr><td><input type="text" name="mobile" placeholder="Enter Mobile Number" title="Mobile No." required/></tr></td>
            <tr><td><input type="email" name="mail_id" placeholder="Enter Email Address" title="Email Address" required/></tr></td>
            <tr><td><input type="password" name="password" placeholder="Enter Password" title="Password" required/></tr></td>
            <tr><td><input type="password" name="confirm_password" placeholder="Confirm Password" title="Confirm Password" required/></tr></td>
            <tr><td>* Password and Confirm Password must be same</td></tr>
            <tr><td><input type="text" name="username" placeholder="Confirm Username" title="Confirm Username" required/></tr></td>
            <tr><td><input type="text" name="shopname" placeholder="Enter Your Shop Name" title="Enter Your Shop Name" required/></tr></td>
            <tr><td><input type="submit" name="register" value="REGISTER" title="Register Yourself"/></tr></td>
        </table>
    </form>
</body>
</html>