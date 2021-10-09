<!DOCTYPE html>
<html>
<head>
    <title>CONTACT US</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style32.css">
    <style>
        textarea{
            width: 400px;
            height: 100%;
            margin: 0px 20px;
            margin-top: 30px;
            border-radius: 5px;
            border: none;
            font-size: 25px;
            padding-left: 10px;
        }    
        .menu{
            display: grid;
            grid-template-columns: 200px 200px 200px 200px 200px;
            grid-gap: 5px;
            justify-content: center;
            border: 3px solid rgba(4, 9, 73, 0.959);
            border-radius: 20px;
            padding: 15px;
            margin: 10px 20px;
            background-color: burlywood;
        }
        .item a{
            text-decoration: none;
            font-weight: bold;
            color: black;
            font-size: 30px;
            font-family: 'Bree Serif', 'serif';     
        }
        .item a:hover{
            font-style: italic;
            color: blue;
            font-size: 30px;
            background-color: #e2eaf5;   
            padding: 15px 30px;
            border-radius: 10px;   
        }
        
        h1{
            font-size: 50px;
            margin: 20px;
        }
        footer{
            background-color: rgb(48, 46, 46);
            margin: 20px;
            margin-bottom: -180px;
            padding: 20px;
            border-radius: 20px;
            color: white;
            font-size: 30px;
            box-sizing: border-box;
            font-family: 'Bree Serif', 'serif';
        }
        a#home{
            color: lightblue;
        }
        footer img{
            width: 70px;
            height: 70px;
            border-radius: 100%;
            margin: 30px;
        }  
    </style>
</head>
<body>
<h1>Contact Us</h1>
    <div class="menu">
        <div class="item"><a href="home.php" title="GO HOME">HOME</a></div>
        <div class="item"><a href="add_item.php" title="ADD NEW ITEMS">ADD ITEM</a></div>
        <div class="item"><a href="bill.php" title="MAKE NEW BILL">BILL</a></div>
        <div class="item"><a href="contact.php" title="CONTACT US">CONTACT</a></div>
        <div class="item"><a href='prac32.php?action=logOut' title="LOG OUT">LOG OUT</a></div>
    </div>
    <?php
        session_start();
        if(!isset($_SESSION['user_name']))
        {
            session_destroy();
            header("Location:prac32.php");
        }
    ?>
    <form method="post">
        <table>
            <tr><td><input type="text" name="first_name" placeholder="First Name" autofocus required/></td></tr>
            <tr><td><input type="text" name="last_name" placeholder="Last Name" required/></td></tr>
            <tr><td><input type="email" name="email_id" placeholder="Email Address" required/></td></tr>
            <tr><td><textarea cols="140" rows="10" name="message" placeholder="Write down Your message..." required no-controls></textarea></td></tr>
            <tr><td><input type="submit" name="submit" value="SEND" onclick="alert('Thank You for writing to us...! We\'ll reply you as soon as possible...')"/></td></tr>
        </table>
    </form>
    <footer>
        <?php
            echo "All &copy; Rights Reserved - ".date('Y')." | @"."<a href='home.php' id='home' title='Bill Maker'>Bill Maker</a><br><br>
            Follow Us On Social Media<br>";           
        ?>
        <a href="https://www.instagram.com/parth.bhavsar_12_/" target="_blank"><img src="../insta.jpg" alt="Instagram @parth.bhavsar_12_" title="Instagram"></a>
        <a href="https://www.twitter.com/parthBhavsar_" target="_blank"><img src="../tweet.jpg" alt="Twitter @parth.bhavsar_12_" title="Twitter"></a>
        <a href="https://www.linkedin.com/in/parth-bhavsar-5631a1220" target="_blank"><img src="../linked_in.png" alt="Linked IN @parth.bhavsar_12_" title="Linked In"></a>
    </footer>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email_id = $_POST['email_id'];
        $message = $_POST['message'];
        $con = mysqli_connect("localhost","root","","mini_project_sem_5");
        if(!mysqli_connect_errno())
        {
            $sql = "INSERT INTO `contact_us`(`first_name`, `last_name`, `email`, `message`) VALUES ('$first_name','$last_name','$email_id','$message')";
            mysqli_query($con,$sql);
        }     
    }
?>