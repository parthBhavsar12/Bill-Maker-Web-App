<!DOCTYPE html>
<html>
<head>
    <title>MAKE NEW BILL</title>
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
        input#bill_details,td#bill_details{
            width: 325px;
            height: 30px;
            padding: 0px 10px;
            margin: 0px;
            color: #7c0909;
        }
        td.right{
            text-align: right;
            font-size: 25px;
            border: none;
        }
        td.left,input.left{
            text-align: left;
            border: none;
        }
        input#bill_details{
            border: 1px solid;
            width: 50%;
            height: 35px;
            font-family: 'Bree Serif', 'serif';
        }
        input.table{
            padding: 0px;
            margin: 0px;
        }
        h2{
            text-align: center;
            font-weight: bold;
            color: #0d0d82;
        }
    </style>
</head>
<body>
<h1>Make New Bill</h1>
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
        $con = mysqli_connect("localhost","root","","mini_project_sem_5");
        $user = $_SESSION['user_name'];
        $sql = "SELECT shopname FROM register where username='$user'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result))
        {
            $shopname = $row['shopname'];
            echo "<h2>YOUR SHOP NAME : ".$shopname."</h2>";
        }
        if(isset($_POST['submit_items']))
        { 
        // $shop = "shop_".$_POST['shop_name'];
        // $shop = str_replace(' ','_',$shop);
        $con = mysqli_connect("localhost","root","","mini_project_sem_5");
        // $sql = "CREATE TABLE $shop (
        //     sr_no INT AUTO_INCREMENT,
        //     item_name VARCHAR(50) UNIQUE NOT NULL,
        //     PRIMARY KEY (sr_no))
        //     ";
        // mysqli_query($con,$sql);
        foreach($_POST['item'] as $item)
        {
            $shop_table_name = str_replace(' ','_',$shopname);
            $shop_table_name = "shop_".$shop_table_name;
            if(strlen($item)<>0)
            {
                $sql = "INSERT INTO `$shop_table_name`(`item_name`) VALUES ('$item')";
                mysqli_query($con,$sql);
            }
        }
    }
    ?>
    <section>
        <form action="bill_2.php" method="post">
            <table>
                <tr>
                    <td id="bill_details" class="right">
                        Enter Customer Name : 
                    </td>
                    <td class="left">
                        <input type="text" name="customer_name" placeholder="Customer Name" title="Customer Name" id="bill_details" class="left" required/>
                    </td>
                </tr>
                <tr>
                    <td id="bill_details" class="right">
                        Enter Customer Mobile No. : 
                    </td>
                    <td class="left">
                        <input type="number" name="customer_mobile" placeholder="Customer Mobile Number" title="Customer Mobile No." id="bill_details" min="1000000000" max="9999999999" class="left" required/>
                    </td>
                </tr>
                <tr>
                    <td id="bill_details" class="right">
                        Enter Bill Issuer Name : 
                    </td>
                    <td class="left">
                        <input type="text" name="bill_issuer_name" placeholder="Bill Issuer Name" title="Bill Issuer Name" id="bill_details" class="left" required/>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit_bill" value=">> 2" title="Go Next"/>
        </form>
    </section>
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