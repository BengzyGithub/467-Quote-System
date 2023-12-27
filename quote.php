<html><head><title>View Quotes</title></head><body>

<?php
    include("legacyinfo.php");
    include("StyleFormat.php");

    try
    {
        $dsn = "mysql:host=courses;dbname=".$username2;
        $pdo = new PDO($dsn, $username2, $password2);
    }
    catch(PDOexception $e)
    {
        echo "connection failed: " . $e->getmessage();
    }

    $customerID = $_GET['GetID'];
    $userID = $_SESSION['id'];

    if(isset($_POST['Del']))
    {

        $delete = $_POST['Del']; 
        $deletequery = $pdo->query("DELETE FROM QUOTE WHERE QUOTE_ID = '".$delete."'");
    }  

    if(isset($_POST['final']))
    {
        $final = $_POST['final']; 
        $deletequery = $pdo->query("UPDATE QUOTE SET QUOTE_STATUS = 2 WHERE QUOTE_ID = '".$final."'");
    }  

    if(isset($_POST['submit']))
    {
        if(!empty($_POST['email']))
        {
            $customeremail = $_POST['email'];

            $exec = $pdo->prepare("INSERT INTO QUOTE (USER_ID, QUOTE_CUST_ID, QUOTE_TOTAL_PRICE, QUOTE_CUST_EMAIL, QUOTE_DATE, QUOTE_STATUS) VALUES (:userid, :custid, 0, :email, :date, 1)");
            $exec->execute(array(":userid" => $userID, ":custid" => $customerID, ":email" => $customeremail, ":date" => date("Y-m-d")));

            $query = $pdo->query("SELECT LAST_INSERT_ID()");
            $quoteID = $query->fetch()["LAST_INSERT_ID()"];

            if(!empty($_POST['note']))
            {
                $exec = $pdo->prepare("INSERT INTO SECRET_NOTE (SECRET_NOTE_DESC, QUOTE_ID) VALUES (:note, :qid)");
                $exec->execute(array(":note" => $_POST['note'], ":qid" => $quoteID));
            }
        }
        else
        {
            echo "Please fill out all mandatory fields of the form and try again.";
        }
    }

    echo '<h1 class="header" style=text-align:center;">';
		echo "View Quotes for Customer #".$customerID;
	echo '</h1>';

    echo '<table class = "prodTable">';
    echo "<tr>";
    echo "<th width=5%>Quote ID</th>",
        "<th width=5%>Quote Total Price</th>",
        "<th width=10%>Customer Email</th>",
        "<th width=10%>Status</th>",
        "<th width=10%>Quote Date</th>",
        "<th width=5%>Edit Quote</th>",
        "<th width=5%>Delete Quote</th>",
        "<th width=5%>Finalize Quote</th>";
    echo "</tr>";

    $cTable = $pdo->query("SELECT * FROM QUOTE WHERE QUOTE_CUST_ID = '".$customerID."'");
    $cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    foreach($cRows as $cRow)
    {
        $QuoteID = $cRow["QUOTE_ID"];

        echo "<tr>";

        echo "<td class='prdtd'>" . $cRow["QUOTE_ID"] . "</td>",
            "<td class='prdtd'>" . $cRow["QUOTE_TOTAL_PRICE"] . "</td>",
            "<td class='prdtd'>" . $cRow["QUOTE_CUST_EMAIL"] . "</td>",
            "<td class='prdtd'>" . $cRow["QUOTE_STATUS"] . "</td>",
            "<td class='prdtd'>" . $cRow["QUOTE_DATE"] . "</td>";

        echo '<form method= "POST">'; 
            echo '<td class="prdtd"><button type="submit" name="EditButton"><a href="editquote.php?GetID='.$QuoteID.'">Edit Quote</a></td>'; 
        echo "</form>";	

        echo '<form method= "POST">'; 
            echo '<td class="prdtd"><button class="delButton" type="submit" name="Del" value="'.$QuoteID.'">X</button></td>';
        echo "</form>";

        echo '<form method= "POST">'; 
            echo '<td class="prdtd"><button class="submit" type="submit" name="final" value="'.$QuoteID.'">Finalize</button></td>';
        echo "</form>";

        echo "</tr>";
    }
    echo "</table>";

    echo '<h3 class="header" style=text-align:center;>';
		echo "Add new quote:";
	echo '</h3>';
?>


<form method="POST">
    <label for="email">Customer Email:</label>
    <input type="text" name="email" id="email" maxlength="20"><br><br>

    <label for="Note">Note (optional):</label>
    <input type="text" name="note" id="note"><br><br>

    <button class="add" type="submit" name="submit">Add Quote</button>
</form>

<a href="customers.php"><button class = "GoBack"> <- Go Back</button></a>

</body></html>