<html><head><title>Home</title></head><body>
<?php
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

    echo '<a href="finalquotes.php"/><button class = "Associates">View Finalized Quotes</button></a><br>';
    echo '<a href="orders.php"/><button class = "Associates">View Accepted Orders</button></a><br>';

?>
</body></html>