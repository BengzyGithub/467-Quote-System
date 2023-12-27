<html><head><title>Associates Page</title></head>
    <body>
<?php
//error_reporting (E_ALL ^ E_NOTICE);
include("log_in.php"); //similar to secrets.php /contains username and password
include("Library.php"); // contains functions to draw the tables
include("StyleFormat.php"); //contains styles to be used

//try connecting to the database system
try{
    $dsn = "mysql:host=courses;dbname=".$username;
    $pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e)
{
    echo "Connection to database failed: " . $e->getMessage();
}//end of try and catch

echo '<h1 class="header" style=text-align:center;">';
			echo "Our Sales Associates";
		echo '</h1>';


/***********************************************************************
 * If condition tp checks if the user clicked on the delete 
 * button to remove an employee, 
 * 
 * if true: delete the current information of the employee in that row
 ***************************************************************/
if(isset($_POST['Del']))
{

//if(!(empty($_POST['Firstname']) || empty($_POST['Lastname']) || empty($_POST['Address']) ||
 //empty($_POST['Totalcomission']) || empty($_POST['Password'])))
//{
    
    $delete = $_POST['Del']; //GET THE Pointer to the ID 
    $deletequery = $pdo->query("DELETE FROM USER WHERE USER_ID = '".$delete."'");//search the database for the USER_ID

}       
    echo '<table class = "prodTable">';
	  echo "<tr>";
	  echo "<th width=20%>Employee ID</th>",
           "<th width=20%>Employee First name</th>",
           "<th width=20%>Employee Last name</th>",
           "<th width=20%>Employee Address</th>",
           "<th width=20%>Commission</th>",
           "<th width=20%>Edit info</th>",
           "<th width=10%>Remove</th>";
    echo"</tr>"; 
    //close the first php box?>

	<?php //open a new php box table data
	  $cTable = $pdo->query("SELECT * FROM USER;");
	  $cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    foreach($cRows as $cRow)//AS YOU PRINT OUT ONE ROW FROM EVERY ROWS IN THE THE TABLE,
     {
        //make a table to completely pull out the data from PROJECT.sql
        $UserID = $cRow['USER_ID'];
        $UserfName = $cRow['USER_FIRST_NAME'];
		$UserlName = $cRow['USER_LAST_NAME'];
        $UserAddr = $cRow['USER_ADDRESS'];
        $UserCommsn = $cRow['USER_TOTAL_COMMISION'];
    ?>

    <?php //Put the variables in the allocated spaces for each data in table?>
            <tr class='prdtd'>
                <td class='prdtd'><?php echo $UserID ?></td>
                <td class='prdtd'><?php echo $UserfName ?></td>
                <td class='prdtd'><?php echo $UserlName ?></td>
                <td class='prdtd'><?php echo $UserAddr ?></td>
                <td class='prdtd'><?php echo $UserCommsn ?></td>
                <td><button class="EditButton" ><a href="EditEmp.php?GetID=<?php echo $UserID ?>">Edit</button></a></td>

            <?php  
            echo'<form action="Associates.php?ID=$UserfName" method="POST">';   
             echo '<td class="prdtd"><button class="delButton" type="submit" name="Del" value="'.$cRow['USER_ID'].'"<a href="?php echo $UserfName"> delete </button></a></td>';
            //echo "<td class="prdtd"><button class="delButton" value="'.$cRow['USER_ID'].'"> <a href="delete.php?Del=<?php echo $UserfName  ">Delete</button></a></td>";
            echo"</form>";
            ?>
            </tr>
        <?php 
    }

    echo "</table>";
    include("insert_form.php");// connects the user to the insertion page
        ?>
</body>
<a href= "Administration.php"/><button class ="GoBack"> <= Go Back</button></a>
</html>