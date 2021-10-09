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
        table{
            background: unset;
            width: 100%;
            box-shadow: none;
            border: none;
        }
        th,td{
            border: 1px solid #bd6363;
            border-radius: 10px;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
        }
        th{
            background-color: #bd6363;
            color: white;
            font-size: 25px;
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
        if(isset($_SESSION['user_name']))
        {
            echo "<marquee direction='left' behavior='alternate'>Welcome ". $_SESSION['user_name']. ".......!</marquee>";
        }
        else
        {
            session_destroy();
            header("Location:prac32.php");
        }

        $con = mysqli_connect("localhost","root","","mini_project_sem_5");
        $shop = $_SESSION['user_name'];
        $sql = "SELECT shopname FROM register where username='$shop'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result))
        {
            $shopname = $row['shopname'];
            echo "<h2>YOUR SHOP NAME : ".$shopname."</h2>";
        }        
        $shop = "shop_".$shopname;
        $shop = str_replace(' ','_',$shopname);
        $shop = "shop_".$shop;
        $sql = "CREATE TABLE $shop(
            sr_no INT AUTO_INCREMENT,
            item_name VARCHAR(50)
        )";
        $sql = "CREATE TABLE $shop (
            sr_no INT AUTO_INCREMENT,
            item_name VARCHAR(50) UNIQUE NOT NULL,
            PRIMARY KEY (sr_no))
            ";
            mysqli_query($con,$sql);
        // echo $sql;
        $sql = "SELECT * FROM $shop";
        $result = mysqli_query($con,$sql);
        $row_count = mysqli_num_rows($result);
        if($row_count > 0)
        {
            echo "<p>* Available items in your shop :</p>";
            echo '<table>
            <tr><th>#</th><th>Item Name</th></tr>';    
            while($row = mysqli_fetch_array($result))
            {
            echo '
            <tr><td>'.$row['sr_no'].'</td>
            <td>'.$row['item_name'].'</td></tr>
            ';
            }
            echo '</table>';
        }
        else
        {
            echo  "<p>* No any Available items in your shop. click <a href='add_item.php'>here</a> to add new items available in your shop...</p>";
        }
    ?>
        <!-- <table>
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
        </table> -->
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