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
        input[type="number"]{
            border: 1px solid;
            padding-left: 10px;
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
        $_SESSION['customer_name'] = $_POST['customer_name'];
        $_SESSION['customer_mobile'] = $_POST['customer_mobile'];
        $_SESSION['bill_issuer'] = $_POST['bill_issuer_name'];
        echo "<table>
        <tr>
            <th>Customer Name</th><th>Customer Mobile No.<th>Bill Isuuer Name</th>
        </tr>
        <tr>
            <td>".$_SESSION['customer_name']."</td>
            <td>".$_SESSION['customer_mobile']."</td>
            <td>".$_SESSION['bill_issuer']."</td>
        </tr></table>";
        if(!isset($_SESSION['user_name']))
        {
            session_destroy();
            header("Location:prac32.php");
        }
        // if(isset($_POST['submit_items']))
        // { 
        // // $shop = "shop_".$_POST['shop_name'];
        // $shop = str_replace(' ','_',$shop);
        $customer_name = $_POST['customer_name'];
        $customer_mobile = $_POST['customer_mobile'];
        $bill_issuer_name = $_POST['bill_issuer_name'];
        if(isset($_POST['submit_bill']))
        {
            $con = mysqli_connect("localhost","root","","mini_project_sem_5");
            if(!mysqli_connect_errno())
            {
                $sql = "INSERT INTO `bill`(`customer_name`, `customer_mobile`, `bill_issuer`) VALUES ('$customer_name','$customer_mobile','$bill_issuer_name')";
                mysqli_query($con,$sql);
                // $bill_table_name = 
                $sql = "SELECT `invoice_no` FROM `bill` WHERE customer_name='$customer_name'";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result))
                {
                    $invoice_no = $row['invoice_no'];
                    $invoice_table = "bill_".$invoice_no;
                    // echo "Invoice NO. ".$invoice_no;
                    // $sql = "CREATE TABLE $invoice_table (
                    //     sr_no INT AUTO_INCREMENT,
                    //     item_name VARCHAR(50) UNIQUE NOT NULL,
                    //     rate INT,
                    //     quantity INT,
                    //     amount INT,
                    //     PRIMARY KEY (sr_no))
                    //     ";
                    // mysqli_query($con,$sql);
                    $_SESSION['invoice_table'] = $invoice_table;
                }
            }
        }
        // $sql = "CREATE TABLE $shop (
        //     sr_no INT AUTO_INCREMENT,
        //     item_name VARCHAR(50) UNIQUE NOT NULL,
        //     PRIMARY KEY (sr_no))
        //     ";
        // mysqli_query($con,$sql);
        // foreach($_POST['item'] as $item)
        // {
        //     if(strlen($item)<>0)
        //     {
        //         $sql = "INSERT INTO `shop_jay_mataji_kirana_store`(`item_name`) VALUES ('$item')";
        //         mysqli_query($con,$sql);
        //     }
        // }
    // }
    ?>
    <section>
        <form action="print_bill.php" method="post">
        <!-- <form action="print_bill.php" method="post"> -->
            <?php         
                $user = $_SESSION['user_name'];
                $con = mysqli_connect("localhost","root","","mini_project_sem_5");
                $sql = "SELECT shopname FROM register where username='$user'";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result))
                {
                    $shopname = $row['shopname'];
                    echo "<h2>YOUR SHOP NAME : ".$shopname."</h2>";
                }        
                $shop = "shop_".$shopname;
                $shop = str_replace(' ','_',$shopname);
                $shop = "shop_".$shop;
                $sql = "SELECT * FROM $shop";
                // echo $sql;
                $result = mysqli_query($con,$sql);
                $row_count = mysqli_num_rows($result);
                if($row_count > 0)
                {
                    echo '<p>* Available items in your shop :</p>';
                    // echo '';
                    echo '<table>
                    <tr><th>#</th><th>Item Name</th><th>Rate ( INR )</th><th>Quantity ( Units )</th></tr>';    
                    while($row = mysqli_fetch_array($result))
                    {
                    echo '
                    <tr><td>'.$row['sr_no'].'</td>
                    <td>'.$row['item_name'].'</td>
                    <td><input class="table" type="number" name="rate_of_item_'.$row["sr_no"].'" placeholder="Rate of item '.$row["sr_no"].'" min="0" value="0"/></td>
                    <td><input class="table" type="number" name="quantity_of_item_'.$row["sr_no"].'" placeholder="Quantity of item '.$row["sr_no"].'" min="0" value="0"/></td>
                    </tr>
                    ';
                    }
                    echo '</table>';
                }
                else
                {
                    echo  "<p>* No any Available items in your shop. click <a href='add_item.php'>here</a> to add new items available in your shop...</p>";
                }
            ?>
            <input type="submit" name="submit_bill_2" value="Print Your Bill"/>
        </form>
        <!-- </form> -->
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