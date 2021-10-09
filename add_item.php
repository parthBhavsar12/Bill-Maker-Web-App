<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style32.css">
    <style>
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
        h2{
            text-align: center;
            font-weight: bold;
            color: #0d0d82;
        }
    </style>
</head>
<body>
    <h1>Bill Maker</h1>             
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
    <form method="post" action="bill.php">
        <?php
            $con = mysqli_connect("localhost","root","","mini_project_sem_5");
            $user = $_SESSION['user_name'];
            $sql = "SELECT shopname FROM register where username='$user'";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result))
            {
                $shopname = $row['shopname'];
                echo "<h2>YOUR SHOP NAME : ".$shopname."</h2>";
            }
        ?>
        <!-- <input type="text" name="shop_name" placeholder="Shop Name" title="Shop Name" autofocus required style="border: solid 1px;"/> -->
        <p>* Enter new available items in your shop :</p>
        <table>
            <tr><td>
                <input type="text" name="item[]" placeholder="Add new Item Name" title="New Item Name" required/>
            </td></tr>
            <tr><td>
                <input type="text" name="item[]" placeholder="Add new Item Name" title="New Item Name"/>
            </td></tr>
            <tr><td>
                <input type="text" name="item[]" placeholder="Add new Item Name" title="New Item Name"/>
            </td></tr>
            <tr><td>
                <input type="submit" name="submit_items" value="SAVE"  title="Add Items" title="Save Items" required/>
            </td></tr>
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