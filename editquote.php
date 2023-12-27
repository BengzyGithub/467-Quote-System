<html><head><title>Edit Quote</title></head><body>

<?php
    # TODO: finalized quotes (QUOTE_STATUS >= 1) only *show* line items, notes and allow discounts to be set, no adding/modifying line items or notes
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

    $QuoteID = $_GET['GetID'];

    if(isset($_POST['Edit']))
    {
        $edit = $_POST['Edit'];
        $editdesc = $_POST['editDesc'];
        $editprice = $_POST['editPrice'];
        $editqty = $_POST['editQty'];
        $editquery = $pdo->prepare("UPDATE QUOTE_LINE_ITEM SET LINE_DESC = :editdesc, LINE_PRICE = :editprice, LINE_QTY = :editqty WHERE LINE_ID = :id");
        $editquery->execute(array(":editdesc" => $editdesc, ":editprice" => $editprice, ":editqty" => $editqty, ":id" => $edit));
    }  

    if(isset($_POST['Del']))
    {
    
        $delete = $_POST['Del']; 
        $deletequery = $pdo->query("DELETE FROM QUOTE_LINE_ITEM WHERE LINE_ID = '".$delete."'");

    }  

    if(isset($_POST['delNote']))
    {
    
        $deletenote = $_POST['delNote']; 
        $deletequery = $pdo->query("DELETE FROM SECRET_NOTE WHERE SECRET_NOTE_ID = '".$deletenote."'");

    }  

    if(isset($_POST['delDisc']))
    {
    
        $deletedisc = $_POST['delDisc']; 
        $deletequery = $pdo->query("DELETE FROM DISCOUNT WHERE DISCOUNT_ID = '".$deletedisc."'");

    }  

    if(isset($_POST['AddLine']))
    {
        $linedesc = $_POST['addDesc'];
        $lineprice = $_POST['addPrice'];
        $lineqty = $_POST['addQty'];
        $linequery = $pdo->prepare("INSERT INTO QUOTE_LINE_ITEM (QUOTE_ID, LINE_DESC, LINE_PRICE, LINE_QTY) VALUES (:qid, :desc, :price, :qty)");
        $linequery->execute(array(":qid" => $QuoteID, ":desc" => $linedesc, ":price" => $lineprice, ":qty" => $lineqty));

        $addprice = $lineprice * $lineqty;
        $pricequery = $pdo->query("SELECT QUOTE_TOTAL_PRICE FROM QUOTE WHERE QUOTE_ID='".$QuoteID."'");

        $getprice = $pricequery->fetch();
        $newprice = $getprice['QUOTE_TOTAL_PRICE'] + $addprice;

        $discquery = $pdo->prepare("UPDATE QUOTE SET QUOTE_TOTAL_PRICE = :newprice WHERE QUOTE_ID = :qid");
        $discquery->execute(array(":qid" => $QuoteID, ":newprice" => $newprice));
    }  

    if(isset($_POST['AddNote']))
    {
        $notedesc = $_POST['noteDesc'];
        $notequery = $pdo->prepare("INSERT INTO SECRET_NOTE (QUOTE_ID, SECRET_NOTE_DESC) VALUES (:qid, :desc)");
        $notequery->execute(array(":qid" => $QuoteID, ":desc" => $notedesc));
    }

    if(isset($_POST['SetDiscFlat']))
    {
        $flatdisc = $_POST['flatDisc'];
        $discquery = $pdo->prepare("INSERT INTO DISCOUNT (QUOTE_ID, DISCOUNT_TYPE, DISCOUNT_VALUE) VALUES (:qid, 'FLAT', :val)");
        $discquery->execute(array(":qid" => $QuoteID, ":val" => $flatdisc));
        #$pricequery = $pdo->query("SELECT QUOTE_TOTAL_PRICE FROM QUOTE WHERE QUOTE_ID='".$QuoteID."'");
        #$getprice = $pricequery->fetch();
        #$newprice = $getprice['QUOTE_TOTAL_PRICE'] - $flatdisc;
        #$discquery = $pdo->prepare("UPDATE QUOTE SET QUOTE_TOTAL_PRICE = :newprice WHERE QUOTE_ID = :qid");
        #$discquery->execute(array(":qid" => $QuoteID, ":newprice" => $newprice));
    }
    
    if(isset($_POST['SetDiscPer']))
    {
        $perdisc = $_POST['perDisc'];
        $discquery = $pdo->prepare("INSERT INTO DISCOUNT (QUOTE_ID, DISCOUNT_TYPE, DISCOUNT_VALUE) VALUES (:qid, 'PERCENT', :val)");
        $discquery->execute(array(":qid" => $QuoteID, ":val" => $perdisc));
        #$pricequery = $pdo->query("SELECT QUOTE_TOTAL_PRICE FROM QUOTE WHERE QUOTE_ID='".$QuoteID."'");
        #$getprice = $pricequery->fetch();
        #$newprice = $getprice['QUOTE_TOTAL_PRICE'] * $perdisc / 100;
        #$newprice = $getprice['QUOTE_TOTAL_PRICE'] - $newprice;
        #$discquery = $pdo->prepare("UPDATE QUOTE SET QUOTE_TOTAL_PRICE = :newprice WHERE QUOTE_ID = :qid");
        #$discquery->execute(array(":qid" => $QuoteID, ":newprice" => $newprice));
    } 

    echo '<h2 class="header" style=text-align:center;">';
			echo "View Line Items";
		echo '</h2>';
    
    $cTable = $pdo->query("SELECT * FROM QUOTE_LINE_ITEM WHERE QUOTE_ID='".$QuoteID."'");
    $cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    echo '<table class = "prodTable">';
	echo "<tr>";
	    echo "<th width=10%>Line ID</th>",
            "<th width=10%>Item Description</th>",
            "<th width=10%>Item Price</th>",
            "<th width=10%>Item Quantity</th>",
            "<th width=10%>Modify Item</th>",
            "<th width=10%>Delete Item</th>";

    echo "</tr>";

    foreach($cRows as $cRow)
    {
        echo "<tr>";
            
            echo '<form method= "POST">';
                echo "<td class='prdtd'>" . $cRow["LINE_ID"] . "</td>",
                    "<td class='prdtd'><input type='text' name='editDesc' value='".$cRow["LINE_DESC"]."'></td>",
                    "<td class='prdtd'><input type='text' name='editPrice' value='".$cRow["LINE_PRICE"]."'></td>",
                    "<td class='prdtd'><input type='text' name='editQty' value='".$cRow["LINE_QTY"]."'></td>";
                
                echo '<td class="prdtd"><button class="editButton" type="submit" name="Edit" value="'.$cRow['LINE_ID'].'">Submit</button></td>';
            echo "</form>";
             
            echo '<form method= "POST">'; 
                echo '<td class="prdtd"><button class="delButton" type="submit" name="Del" value="'.$cRow['LINE_ID'].'">X</button></td>';
            echo "</form>";

        echo "</tr>";
    }

    echo "</table><br>";

    echo '<h2 class="header" style=text-align:center;">';
			echo "Add New Items";
		echo '</h2>';

    echo '<form method= "POST">'; 
        echo '<button class="add" type="submit" name="AddLine">Add Item</button><br><br>';

        echo '<label>Item Description</label>';
        echo '<input type="text" name="addDesc">';

        echo '<label>Item Price</label>';
        echo '<input type="text" name="addPrice">';

        echo '<label>Item Quantity</label>';
        echo '<input type="text" name="addQty">';

    echo "</form>";

    echo '<h2 class="header" style=text-align:center;">';
			echo "View Secret Notes";
		echo '</h2>';

    $cTable = $pdo->query("SELECT * FROM SECRET_NOTE WHERE QUOTE_ID='".$QuoteID."'");
    $cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    echo '<table class = "prodTable">';
	echo "<tr>";
	    echo "<th width=10%>Note ID</th>",
            "<th width=10%>Note Description</th>",
            "<th width=5%>Delete Note</th>";

    echo "</tr>";
    
    foreach($cRows as $cRow)
    {
        echo "<tr>"; 
            echo "<td class='prdtd'>" . $cRow["SECRET_NOTE_ID"] . "</td>",
                "<td class='prdtd'>" .$cRow["SECRET_NOTE_DESC"]. "</td>";
                
            echo '<form method= "POST">'; 
                echo '<td class="prdtd"><button class="delButton" type="submit" name="delNote" value="'.$cRow['SECRET_NOTE_ID'].'">X</button></td>';
            echo "</form>";

        echo "</tr>";
    }

    echo "</table><br>";

    echo '<h2 class="header" style=text-align:center;">';
			echo "Add New Notes";
		echo '</h2>';

    echo '<form method="POST">'; 
        echo '<button class="add" type="submit" name="AddNote">Add Note</button><br><br>';

        echo '<label>Note Description</label>';
        echo '<input type="text" name="noteDesc">';

    echo "</form>";

    echo '<h2 class="header" style=text-align:center;">';
        echo "View Discounts";
    echo '</h2>';

    $cTable = $pdo->query("SELECT * FROM DISCOUNT WHERE QUOTE_ID='".$QuoteID."'");
    $cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    echo '<table class = "prodTable">';
    echo "<tr>";
    echo "<th width=10%>Discount ID</th>",
        "<th width=10%>Discount Type</th>",
        "<th width=10%>Discount Amount</th>",
        "<th width=5%>Delete Discount</th>";

    echo "</tr>";

    foreach($cRows as $cRow)
    {
    echo "<tr>"; 
        echo "<td class='prdtd'>" . $cRow["DISCOUNT_ID"] . "</td>",
            "<td class='prdtd'>" .$cRow["DISCOUNT_TYPE"]. "</td>",
            "<td class='prdtd'>" .$cRow["DISCOUNT_VALUE"]. "</td>";
            
        echo '<form method= "POST">'; 
            echo '<td class="prdtd"><button class="delButton" type="submit" name="delDisc" value="'.$cRow['DISCOUNT_ID'].'">X</button></td>';
        echo "</form>";

    echo "</tr>";
    }

    echo "</table><br>";

    echo '<h2 class="header" style=text-align:center;">';
        echo "Modify Discounts";
    echo '</h2>';

    echo '<form method="POST">'; 
        echo '<button class="setdiscflat" type="submit" name="SetDiscFlat">Add Flat Discount</button><br><br>';
        echo '<input type="number" name="flatDisc" min="0">';
    echo "</form><br><br>";

    echo '<form method="POST">'; 
        echo '<button class="setdiscper" type="submit" name="SetDiscPer">Add % Discount</button><br><br>';
        echo '<input type="number" name="perDisc" min="0" max="100">';
    echo "</form>";

    # TODO: this GoBack button links to either customers.php or finalquotes.php depending on a session variable (set by customers.php)
    echo '<br><a href="home.php"><button class = "GoHome"> <- Go Back</button></a>';
    ?>

</body></html>