<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL Quotes/View QUOTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include("log_in.php"); //similar to secrets.php /contains username and password
//include("ShopCart.php");// needed to retrieve the Total into the checkout
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
}//end of connection

echo '<h1 class="header" style=font-family:serif;">';
		echo " List Of All Quotes";
	echo '</h1>';

    echo '<h5 class="Listby">';
    echo  "List by:";
    echo '</h5>';

    //form to create the sort listings 
    
echo '<form action="Quotes.php" method="post">';  
    echo '<input type="submit" class="ascendingorder" name="ASC" value="low price"><br><br>';
    echo ' <input type="submit" class="descendingorder" name="DESC" value="high price"><br><br>';
    //echo '<input type="date" class="dateOrder" name="FINAlz"><br><br>';
echo '</form>';
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                    <label>Data from form</label>
                    <form action="" method="POST" >
                        <input type="text" style="width: 300px; height: 40px" class="search2" name="search_col" placeholder="search by: Quote_id/status..">
                        <input type="submit" class="search1" name="search_data" value="SEARCH">
                    </form>
                        <form action="" method="GET" class="Datestyle">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="card-body">  
                            <?php 
                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $dateQuerry = "SELECT * FROM QUOTE WHERE QUOTE_DATE BETWEEN '$from_date' AND '$to_date' ";
                                    //$query_run = mysqli_query($con, $query);
                                    $result = $pdo ->query($dateQuerry);
                                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                }
                            ?>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<?php
/**
 * This statement checks if the user clicked on the ascending 
 * or descending order button and sorts the table accordingly 
 * while displaying the data
 */

// Ascending Order
if(isset($_POST['ASC']))
{
    $asc_query = "SELECT * FROM QUOTE ORDER BY QUOTE_TOTAL_PRICE ASC";
    $result = $pdo->query($asc_query);
    //FETCH BOTH NEEDED TO GET USABLE INDEX	
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
}

// Descending Order
elseif (isset ($_POST['DESC'])) 
    {
          $desc_query = "SELECT * FROM QUOTE ORDER BY QUOTE_TOTAL_PRICE DESC";
          $result = $pdo ->query($desc_query);
          $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    }

    elseif (isset ($_POST['search_data'])) 
    {
        $indexSearch = $_POST['search_col'];
        $searchID_query = "SELECT * FROM QUOTE WHERE QUOTE_CUST_ID = '".$indexSearch."'";
        $result = $pdo ->query($searchID_query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    }
    elseif (isset ($_POST['search_data'])) 
    {
        $indexSearch2 = $_POST['search_col'];
        $searchStatus_query = "SELECT * FROM QUOTE WHERE QUOTE_STATUS = '".$indexSearch2."'";
        $result = $pdo ->query($searchStatus_query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    }
 
    // Print out the Default Order in database
 else {
    $sql = "SELECT * FROM QUOTE;";
    $result = $pdo->query($sql);
    //FETCH BOTH NEEDED TO GET USABLE INDEX	
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
}

draw_table($rows);      // print out the quote table using the given function

?>
<a href= "Administration.php"/><button class = "GoBack">Go Back</button></a>
</body>
</html>