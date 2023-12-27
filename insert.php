<?php

include("log_in.php"); //similar to secrets.php /contains username and password
    //try connecting to the database system
try{
    $dsn = "mysql:host=courses;dbname=".$username;
    $pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e)
{
    echo "Connection to database failed: " . $e->getMessage();
}//end of try and catch

/**
 * Check if the submit button was clicked 
 * and insert the new data into the database 
 * 
 */
    if(isset($_POST['submit']))
    {
        //if the any of the fields for the data is not filled up (empty)
        if(empty($_POST['Firstname']) || empty($_POST['Lastname']) || empty($_POST['Address']) ||
         empty($_POST['Totalcomission']) || empty($_POST['Password']))
        {
            //print out the error message
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            
            $UserfName = $_POST['Firstname'];
            $UserlName = $_POST['Lastname'];
            $UserAddr = $_POST['Address'];
            $UserCommsn = $_POST['Totalcomission'];
            $Userpassw = $_POST['Password'];
            
            // insert new Employee
            $insertquery = $pdo->prepare('INSERT INTO USER (USER_FIRST_NAME,USER_LAST_NAME,USER_ADDRESS,USER_TOTAL_COMMISION,USER_PASSWORD) VALUES (?,?,?,?,?)');

            // execute sql query
             $insertquery->execute(array($UserfName,$UserlName,$UserAddr,$UserCommsn,$Userpassw));
            if($insertquery)
            {
                echo "<meta http-equiv='refresh' content='2;url=Associates.php'>";
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        //echo "<meta http-equiv='refresh' content='0.5;url=index.php'>";
    }



?>