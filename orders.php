<html><head><title>View Orders</title></head><body>

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
		echo "Accepted Orders";
	echo '</h1>';

    echo '<table class = "prodTable">';
	    echo "<tr>";
	    echo "<th width=10%>Quote ID</th>",
            "<th width=10%>User ID</th>",
            "<th width=10%>Quote Total Price</th>",
            "<th width=10%>Customer Email</th>",
            "<th width=10%>Quote Date</th>",
            "<th width=10%>Send to Processing</th>";
    echo"</tr>";
	
	$cTable = $pdo->query("SELECT * FROM QUOTE");
	$cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    foreach($cRows as $cRow)
    {
        $QuoteID = $cRow["QUOTE_ID"];

        if($cRow['QUOTE_STATUS'] == 'SANCTIONED')
        {
            echo "<tr>";

            echo "<td class='prdtd'>" . $cRow["QUOTE_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["USER_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_TOTAL_PRICE"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_CUST_EMAIL"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_DATE"] . "</td>";
            
            echo '<form method= "POST">'; 
                echo '<td class = "prdtd"><button class="EditButton" type="submit" name="Send"><a class="EditButton" href="sendquote.php?GetID='.$QuoteID.'">Send</a></td>'; 
            echo "</form>";	 
            
            echo "</tr>";
        }
        else if ($cRow['QUOTE_STATUS'] == 'ORDERED') 
        {
            echo "<tr>";

            echo "<td class='prdtd'>" . $cRow["QUOTE_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["USER_ID"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_TOTAL_PRICE"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_CUST_EMAIL"] . "</td>",
                "<td class='prdtd'>" . $cRow["QUOTE_DATE"] . "</td>";
            
            echo '<td class = "prdtd">Already Processed</td>';  
            
            echo "</tr>";
        }
    }

    echo "</table>";

    ?>

    <a href="home.php"><button class = "GoBack"> <- Go Back</button></a>

</body></html>