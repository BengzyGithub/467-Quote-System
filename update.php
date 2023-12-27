<?php 
//error_reporting (E_ALL ^ E_NOTICE);
include("log_in.php"); //similar to secrets.php /contains username and password
include("StyleFormat.php"); //contains styles to be used

//try connecting to the database system
try{
    $dsn = "mysql:host=courses;dbname=".$username;
    $pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e)
{
    echo "Connection to databse failed: " . $e->getMessage();
}

/**
 * This condition checks if the update button was clicked and if 
 * True: it will push the values from the form by replacing the 
 * old once from the database with the new information from 
 * the form
 */
    if(isset($_POST['Update']))
    {
        $UserID = $_GET['ID'];
        $UserfName = $_POST['Firstname'];
		$UserlName = $_POST['Lastname'];
        $UserAddr = $_POST['Address'];
        $UserCommsn = $_POST['Totalcomission'];
		$Userpassw = $_POST['Password'];

        //$UserID = $_GET['update']; //GET THE Pointer to the ID 
        $updatequery = $pdo->query("UPDATE USER SET USER_FIRST_NAME = '".$UserfName."', USER_LAST_NAME='".$UserlName."',USER_ADDRESS='".$UserAddr."', 
        USER_TOTAL_COMMISION='".$UserCommsn."',USER_PASSWORD='".$Userpassw."' WHERE USER_ID='".$UserID."'");//search the database for the USER_ID

        if($UserID)
        {
            echo "<meta http-equiv='refresh' content='0.5;url=Associates.php'>";
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        echo "<meta http-equiv='refresh' content='0.5;url=Associates.php'>";
    }


?>