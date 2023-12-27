<html><head><title>Sending...</title></head><body>
<?php
    include("log_in.php");

    //try connecting to the database system
    try
    {
        $dsn = "mysql:host=courses;dbname=".$username;
        $pdo = new PDO($dsn, $username, $password);
    }
    catch(PDOexception $e)
    {
      echo "Connection to database failed: " . $e->getMessage();
    }

    $QuoteID = $_GET['GetID'];

    $cTable = $pdo->query("SELECT * FROM QUOTE WHERE QUOTE_ID = '".$QuoteID."'");
	$cRow = $cTable->fetch(PDO::FETCH_ASSOC);
    $userID = $cRow["USER_ID"];
    $custID = $cRow["QUOTE_CUST_ID"];
    $quotePrice = $cRow["QUOTE_TOTAL_PRICE"];
    $custEmail = $cRow["QUOTE_CUST_EMAIL"];
    $quoteDate = $cRow["QUOTE_DATE"];

    $newprice = $quotePrice;
    $discount = 0;
    $cTable = $pdo->query("SELECT * FROM DISCOUNT WHERE QUOTE_ID = '".$QuoteID."'");
	$cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cRows as $cRow) 
    {
        $discount = $cRow["DISCOUNT_VALUE"];
        switch ($cRow["DISCOUNT_TYPE"]) {
            case 'PERCENT':
                $discprice = $newprice * $discount / 100;
                $newprice = $newprice - $discprice;
                break;
            case 'FLAT':
                $newprice = $newprice - $discount;
                break;
            default:
                # not a discount
                echo "ERROR: not a discount";
                break;
        }
    }
    $newprice = round($newprice, 2);
    
    $url = 'http://blitz.cs.niu.edu/PurchaseOrder/';
    $data = array(
        'order' =>  $QuoteID, 
        'associate' => $userID,
        'custid' => $custID, 
        'amount' => $newprice
    );

    $options = array(
        'http' => array(
            'header' => array('Content-type: application/json', 'Accept: application/json'),
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $decode = json_decode($result, true);
    if (!isset($decode['errors'])) 
    {
        # calculate commission
        $commission = (int) $decode['commission'];
        $commValue = $newprice * $commission / 100;

        # get current total commission, add commission to it
        $cTable = $pdo->query("SELECT USER_TOTAL_COMMISION FROM USER WHERE USER_ID = '".$userID."'");
	    $cRow = $cTable->fetch(PDO::FETCH_ASSOC);
        $newComm = $commValue + $cRow['USER_TOTAL_COMMISION'];

        # update new total commission
        $commquery = $pdo->prepare("UPDATE USER SET USER_TOTAL_COMMISION = :val WHERE USER_ID = :uid");
        $commquery->execute(array(":val" => $newComm, ":uid" => $userID));

        # send email
        $sent = mail($custEmail, "Your order has been confirmed!", "Hello, customer #".$custID.". Your order from ".$decode['processDay']." of $".$newprice." has been confirmed!");
        if ($sent) 
        {
            echo "Order confirmation email sent successfully! ",
                "Sent to customer ".$custID." at address ".$custEmail.".";
        }
        else 
        {
            echo "Order confirmation email failed to send... ",
                "Attempted to send to customer ".$custID." at address ".$custEmail.".";
        }
        $exec = $pdo->query("UPDATE QUOTE SET QUOTE_STATUS = 4 WHERE QUOTE_ID = '".$QuoteID."'");

    }
    else 
    {
        # error has occurred
        echo "ERROR: ";
        echo $decode['errors'][0];
    }
?>
<br><br><a href="home.php"><button class = "GoBack"> <- Go Back</button></a>
</body></html>