<html><head><title>View Customers</title></head><body>

<?php
    include("legacyinfo.php");
    include("StyleFormat.php");

    try
    {
        $dsn = "mysql:host=$servername;dbname=".$db;
        $pdo = new PDO($dsn, $username, $password);
    }
    catch(PDOexception $e)
    {
        echo "connection failed: " . $e->getmessage();
    }

    echo '<h1 class="header" style=text-align:center;">';
		echo "View All Customers";
	echo '</h1>';

    echo '<table class="prodTable">';
    echo "<tr>";
    echo "<th width=5%>Customer ID</th>",
        "<th width=5%>Customer Name</th>",
        "<th width=10%>Address Street</th>",
        "<th width=5%>Address City</th>",
        "<th width=10%>Contact Info</th>",
        "<th width=5%>View Quotes</th>";
    echo "</tr>";

    $cTable = $pdo->query("SELECT id, name, city, street, contact FROM customers");
    $cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);
    foreach($cRows as $cRow)
    {
        $customerID = $cRow["id"];

        echo "<tr>";

        echo "<td class='prdtd'>" . $cRow["id"] . "</td>",
            "<td class='prdtd'>" . $cRow["name"] . "</td>",
            "<td class='prdtd'>" . $cRow["city"] . "</td>",
            "<td class='prdtd'>" . $cRow["street"] . "</td>",
            "<td class='prdtd'>" . $cRow["contact"] . "</td>";

        echo '<form method= "POST">'; 
            echo '<td class="prdtd"><button type="submit" name="ViewButton"><a href="quote.php?GetID='.$customerID.'">View Quotes</a></td>'; 
        echo "</form>";	
        
        echo "</tr>";
    }
    echo "</table>";
?>

</body></html>