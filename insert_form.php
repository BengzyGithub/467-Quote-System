<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"/>
    <title>Insertion Form</title>
</head>
<body class="bg-dark">
<?php
include("insert.php");
?>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Add a New Employee? (All fields required)</h3>
                        </div>
                        <div class="card-body">

                            <form action="insert.php" method="post">
                            <div class="form-group">
						<label>First Name</label>
						<input placeholder="Emp first Name.." type="text"  name="Firstname" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input placeholder="Emp last name" type="text" name="Lastname" required>
					</div>
					<div class="form-group">
						<label>Address</label> 
						<textarea placeholder="Emp Adress" type="email" name="Address" ></textarea>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input placeholder="Enter new password" type="text" name="Password" required>
					</div>
					<div class="form-group">
						<label>New Commission</label>
						<input placeholder="Enter Commission Amt" type="text" name="Totalcomission">
					</div>
                        <button class="delButton" class="contButton" class="btn btn-primary" name="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>