<html><head><title>Finalized Quotes</title></head><body>

<?php
    include("log_in.php");
    include("Library.php"); 
    include("StyleFormat.php");

    try{
        $dsn = "mysql:host=courses;dbname=".$username;
        $pdo = new PDO($dsn, $username, $password);
    }
    catch(PDOexception $e)
    {
        echo "Connection to database failed: " . $e->getMessage();
    }

    echo '<h1 class="header" style=text-align:center;">';
		echo "Finalized Quotes";
	echo '</h1>';
    
    if(isset($_POST['Sanction']))
    {
        $curQID = $_POST['Sanction'];
        $sancquery = $pdo->query("SELECT * FROM QUOTE WHERE QUOTE_ID = ".$curQID."");
        $sancrow = $sancquery->fetch(PDO::FETCH_ASSOC);
        $sancCustID = $sancrow["QUOTE_CUST_ID"];
        $sancPrice = $sancrow["QUOTE_TOTAL_PRICE"];
        $sancEmail = $sancrow["QUOTE_CUST_EMAIL"];
        $sancDate = $sancrow["QUOTE_DATE"];

        $newprice = $sancPrice;
        $discount = 0;
        $cTable = $pdo->query("SELECT * FROM DISCOUNT WHERE QUOTE_ID = '".$curQID."'");
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
                    break;
            }
        }

        $sent = mail($sancEmail, "Your quote has been confirmed!", "Hello, customer #".$sancCustID.". Your order from ".$sancDate." has been quoted for a price of $".$newprice.".");
        if ($sent) 
        {
            echo "Quote confirmation email sent successfully! ",
                "Sent to customer ".$sancCustID." at address ".$sancEmail.". \n";
            $exec = $pdo->query("UPDATE QUOTE SET QUOTE_STATUS = 3 WHERE QUOTE_ID = '" . $curQID . "'");
            echo "Quote sanctioned successfully!";
        }
        else 
        {
            echo "Quote confirmation email failed to send... ",
                "Attempted to send to customer ".$sancCustID." at address ".$sancEmail.".";
        }
    }

    echo '<table class = "prodTable">';
	    echo "<tr>";
	    echo "<th width=10%>Quote ID</th>",
            "<th width=10%>User ID</th>",
            "<th width=10%>Quote Total Price</th>",
            "<th width=10%>Customer Email</th>",
            "<th width=10%>Quote Date</th>",
            "<th width=10%>Edit Quote</th>",
            "<th width=10%>Sanction Quote</th>";
    echo"</tr>";
	
	$cTable = $pdo->query("SELECT * FROM QUOTE");
	$cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    foreach($cRows as $cRow)
    {
        $QuoteID = $cRow["QUOTE_ID"];

        # quote is finalized or sanctioned
        if($cRow['QUOTE_STATUS'] == 'FINALIZED')
        {

            echo "<tr>";

            echo "<td class='prdtd'>" . $cRow["QUOTE_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["USER_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_TOTAL_PRICE"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_CUST_EMAIL"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_DATE"] . "</td>";
            
            echo '<form method= "POST">'; 
                echo '<td class = "prdtd"><button class="EditButton" type="submit" name="EditButton"><a class="EditButton" href="editquote.php?GetID='.$QuoteID.'">Edit</a></td>'; 
            echo "</form>";	 

            echo '<form method= "POST">'; 
                echo '<td class = "prdtd"><button class="EditButton" type="submit" name="Sanction" value="'.$cRow['QUOTE_ID'].'">Sanction</a></td>'; 
            echo "</form>";	 

            echo "</tr>";
        }
        else if($cRow['QUOTE_STATUS'] == 'SANCTIONED')
        {

            echo "<tr>";

            echo "<td class='prdtd'>" . $cRow["QUOTE_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["USER_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_TOTAL_PRICE"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_CUST_EMAIL"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_DATE"] . "</td>";
            
            echo '<td class = "prdtd">Sanctioned, awaiting order</td>'; 
            
            echo "</tr>";
        }
    }

    echo "</table>";

    ?>

    <a href="home.php"><button class = "GoBack"> <- Go Back</button></a>

</body></html>