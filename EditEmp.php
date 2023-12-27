<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"/>
    <title>Isertion Form</title>
</head>
<body>
<?php 
 include("log_in.php"); //similar to secrets.php /contains username and password
 //include("Library.php"); // contains functions to draw the tables
//include("StyleFormat.php"); //contains styles to be used
// try  and connect to the database
 try{
	$dsn = "mysql:host=courses;dbname=".$username;
	$pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e)
{
	echo "Connection to database failed: " . $e->getMessage();
}

    $UserID = $_GET['GetID'];
    //$query = " select * from USER where USER_ID='".$UserID."'";
    //$result = mysqli_query($query);

	$cTable = $pdo->query("SELECT * FROM USER WHERE USER_ID='".$UserID."'");
	$cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);

    foreach($cRows as $cRows)
    {
        $UserID = $cRows['USER_ID'];
        $UserfName = $cRows['USER_FIRST_NAME'];
		$UserlName = $cRows['USER_LAST_NAME'];
        $UserAddr = $cRows['USER_ADDRESS'];
        $UserCommsn = $cRows['USER_TOTAL_COMMISION'];
		$Userpassw = $cRows['USER_PASSWORD'];
    }

?>
<?php include("StyleFormat.php"); //contains styles to be used?>

<div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3" style="color:Tomato;"> Edit/Update Employee information </h3>
                        </div>
                        <div class="card-body">
				   <form action="update.php?ID=<?php echo $UserID ?>" method="post">
					<div class="form-group">
						<label>First Name</label>
						<input placeholder="Emp first Name.." type="text"  name="Firstname" value="<?php echo $UserfName ?>">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input placeholder="Emp last name" type="text" name="Lastname" value="<?php echo $UserlName ?>">
					</div>
					<div class="form-group">
						<label>Adress</label> 
						<textarea placeholder="Emp Adress" type="email" name="Address" value="<?php echo $UserAddr ?>"></textarea>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input placeholder="Enter new password" type="text" name="Password" value="<?php echo $Userpassw ?>">
					</div>
					<div class="form-group">
						<label>New Commission</label>
						<input placeholder="Enter Commission Amt" type="text" name="Totalcomission" value="<?php echo $UserCommsn ?>">
					</div>
						<button type="submit" class="add" name="Update" class="btn btn-default">UPDATE</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href= "Associates.php"/><button class ="BackToAssociate"> <= Go Back</button></a>
</body>
</html>
