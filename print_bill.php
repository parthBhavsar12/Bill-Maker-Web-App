<!DOCTYPE html>
<html>
<head>
    <title>YOUR PRINTED BILL</title>
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
        th,td[class="total"]{
            background-color: #bd6363;
            color: white;
            font-size: 25px;
        }
        h2{
            text-align: center;
            font-weight: bold;
            color: #0d0d82;
        }
    </style>
</head>
<body>
<h1>Your Printed Bill</h1>
    <div class="menu">
        <div class="item"><a href="home.php" title="GO HOME">HOME</a></div>
        <div class="item"><a href="add_item.php" title="ADD NEW ITEMS">ADD ITEM</a></div>
        <div class="item"><a href="bill.php" title="MAKE NEW BILL">BILL</a></div>
        <div class="item"><a href="contact.php" title="CONTACT US">CONTACT</a></div>
        <div class="item"><a href='prac32.php?action=logOut' title="LOG OUT">LOG OUT</a></div>
    </div>
    <?php
        // if()
        session_start();
        if(!isset($_SESSION['user_name']))
        {
            session_destroy();
            header("Location:prac32.php");
        }
        $customer_name = $_SESSION['customer_name'];
        $customer_mobile = $_SESSION['customer_mobile'];
        $bill_issuer_name = $_SESSION['bill_issuer'];
        $invoice_table = $_SESSION['invoice_table'];
        $invoice_number = ltrim($invoice_table,"bill_");
        echo "<table>
        <tr>
            <th>Invoice #</th><th>Customer Name</th><th>Customer Mobile No.<th>Bill Isuuer Name</th>
        </tr>
        <tr>
            <td>".$invoice_number."</td>
            <td>".$customer_name."</td>
            <td>".$customer_mobile."</td>
            <td>".$bill_issuer_name."</td>
        </tr></table>";
        if(isset($_POST['submit_bill']))
        {
            header("Location:bill_2.php");           
        }
        if(isset($_POST['submit_bill_2']))
        {
            $con = mysqli_connect("localhost","root","","mini_project_sem_5");
            if(!mysqli_connect_errno())
            {
                // $sql = "INSERT INTO `bill`(`customer_name`, `customer_mobile`, `bill_issuer`) VALUES ('$customer_name','$customer_mobile','$bill_issuer_name')";
                $sql = "CREATE TABLE $invoice_table (
                sr_no INT AUTO_INCREMENT,
                item_name VARCHAR(50) UNIQUE NOT NULL,
                rate INT,
                quantity INT,
                amount INT,
                PRIMARY KEY (sr_no))
                ";
                // mysqli_query($con,$sql);
                // $bill_table_name = 
                // $sql = "SELECT `invoice_no` FROM `bill` WHERE customer_name='$customer_name'";
                $result = mysqli_query($con,$sql);
                // while($row = mysqli_fetch_array($result))
                // {
                //     $invoice_no = $row['invoice_no'];
                //     $invoice_table = "bill_".$invoice_no;
                //     // echo "Invoice NO. ".$invoice_no;
                //     // $sql = "CREATE TABLE $invoice_table (
                //     //     sr_no INT AUTO_INCREMENT,
                //     //     item_name VARCHAR(50) UNIQUE NOT NULL,
                //     //     rate INT,
                //     //     quantity INT,
                //     //     amount INT,
                //     //     PRIMARY KEY (sr_no))
                //     //     ";
                //     // mysqli_query($con,$sql);
                //     $_SESSION['invoice_table'] = $invoice_table;
                // }
            }
        }
    ?>
    <section>
        <form>
            <!-- <table>
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Rate</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>PENCILS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>SHARPNERS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>ERASERS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>SCALES</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" class="total">TOTAL AMOUNT</td>
                    <td colspan="2" class="total">12345</td>
                </tr>
            </table> -->
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
                    $total_amount = 0;
                    echo '<p>* Available items in your shop :</p>';
                    // echo '';
                    echo '<table>
                    <tr><th>#</th><th>Item Name</th><th>Rate ( INR )</th><th>Quantity ( Units )</th><th>Amount ( INR )</th></tr>'; 
                    $sr_no = 1;  
                    while($row = mysqli_fetch_array($result))
                    {
                        $row_no = $row["sr_no"];
                        $row_item = $row['item_name'];
                        $rate = $_POST['rate_of_item_'.$row_no];
                        $quantity = $_POST['quantity_of_item_'.$row_no];
                        $amount = $rate * $quantity;
                        $sql = "INSERT INTO $invoice_table(`item_name`, `rate`, `quantity`, `amount`) VALUES ('$row_item','$rate','$quantity','$amount')";
                        if($amount>0)
                        {
                            echo '
                            <tr><td>'.$sr_no.'</td>
                            <td>'.$row_item.'</td>
                            <td>'.$rate.'</td>
                            <td>'.$quantity.'</td>
                            <td>'.$amount.'</td>
                            </tr>
                            ';
                            $sr_no += 1;
                        }
                        $total_amount += $amount;
                        mysqli_query($con,$sql);
                    }
                echo '<tr>
                    <td colspan="3" class="total">TOTAL AMOUNT</td>
                    <td colspan="2" class="total">'.$total_amount.'</td>
                    </tr>
                    </table>';
                }
                else
                {
                    echo  "<p>* No any Available items in your shop. click <a href='add_item.php'>here</a> to add new items available in your shop...</p>";
                }
            ?>
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