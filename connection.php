<html><head><title>Connecting...</title></head><body>
<?php
    session_start();

    $username = "z1726017";
    $password = "1996May14";

    //try connecting to the database system
    try
    {
        $dsn = "mysql:host=courses;dbname=".$username;
        $con = new PDO($dsn, $username, $password);
    }
    catch(PDOexception $e)
    {
      echo "Connection to database failed: " . $e->getMessage();
    }

    if(!isset($_POST['id'], $_POST['password']))
    {
      exit("Please fill out all fields");
    }

    $userID = $_POST['id'];

    $query = $con->query("SELECT USER_PASSWORD FROM USER WHERE USER_ID ='" . $userID . "'");
    
    if ($query->rowCount() > 0) 
    {
      $userpass = $query->fetch()["USER_PASSWORD"];
      if($_POST['password'] === $userpass)
      {
        //Verification successful
        $_SESSION['id'] = $userID;
        header('location:customers.php');
      }
      else
      {
        //incorrect password
        echo 'Incorrect password';
      }
    }
    else
    {
      //incorrect username
      echo 'Incorrect id';
    }
?>
</body></html>