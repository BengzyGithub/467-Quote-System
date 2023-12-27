<?php
//This is where the drawing table starts
function drawTable($row)
{
echo '<table class = "table">';
    echo "<tr>";

        foreach($row[0] as $key => $item)
        {
            echo "<th> $key </th>";
        }

    echo "</tr>";

	foreach($row as $row)
	{
		echo"<tr>";
		echo "<td>".$row["USER_ID"] . "</td>
		<td>" . $row["USER_FIRST_NAME"] . "</td>
		<td>" . $row["USER_TOTAL_COMMISION"] . "</td>";
		echo"</tr>";
	}

	echo "</table>";


}#end of draw function

function draw_table($rows)
{
    if(empty($rows))
    {
        echo "<p>No Results found</p>";
    }

    else
    {
        echo "<table border=4  class=QuoteTable>";
        echo "<tr>";

        foreach($rows[0] as $key => $item)
        {
            echo "<th class='prdtd'>$key</th>";
        }
        echo "</tr>";

        foreach($rows as $row )
        {
            echo "<tr>";
            foreach($row as $key => $item)
                {
                    echo "<td class='prdtd'>$item</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
    }
}

    function CheckOutForm()
    {
    echo '<form method="POST">';
        
    echo "<h3>"."Insert Billing Information"."</h3>";
        echo '<input class="size" type="text" name="CustName"/> NAME '; // Name
        echo '<input class="size" type="text" name="CustAddr"/> ADDRESS ';    // Shipping addess
        echo '<input class="size" type="text" name="CustCardN"/> CardNum <br/>';         // Billing information credit card

    

        echo '<br/><select class="size" name="select" >';
                echo '<option>No</option>';
                echo '<option>Yes</option>';
        
        echo '<input class="submitButtons" type="submit" value="did you find our products interesting?">';
        echo "\t";
        echo '<input class="size type="text" name="OrdNote"/> Leave a comment ?';    // item select
        echo '<br/><input type="reset" value="clear all fields"/> <br/>';
        echo "<h3 >"."Complete Checkout?"."</h3>";
        echo '<input type="radio" name="Done"/> Yes';  
                
        echo '<br/><input class="submitButtons" type="submit" value="Buy Now"/>';
        echo "</form>";


    }
function drawTableNoHeader($row)
    {
    echo "<table border=1 cellspacing=3>";
    
    foreach($row as $row)
        {
            echo "<tr>";

            foreach($row as $key => $item)
            {
                echo "<td> $item </td>";
            }#end of inner loop

            echo "</tr>";

        }#end of outer loop

            echo "</table>";

    }#end of drawTableNoHeader

?> 