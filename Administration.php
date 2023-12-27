<html><head><title>Administrators Page</title></head>
    <body>
<?php
   
    include("log_in.php"); //similar to secrets.php /contains username and password
    include("Library.php"); // contains functions to draw the tables
	include("StyleFormat.php"); //contains styles to be used

		//My course login data
        
		try{
            $dsn = "mysql:host=courses;dbname=".$username;
            $pdo = new PDO($dsn, $username, $password);
        }
        catch(PDOexception $e)
        {
            echo "Connection to database failed: " . $e->getMessage();
	    }

		
/**
 * adding style and page header
 * 
 */
		echo '<h1 class="header" style=font-family:papyrus cursive;">';
			echo "Welcome-Administrators";
		echo '</h1>';

		
			 //adding label to title
		echo '<h3 class="question", style=text-size: 20px;>';
		echo "What will you like to do?:";
		echo '</h3>';

		//Admin description
		echo '<h5 class="moto">';
		echo "Our MOTO:    ";
		echo "As Admins we value our Associates that help maintain this company. We strive for better choices in helping 
				the company grow together with the customers. Here, we will make Manages Sales Associates and look through 
				all quotes";
		echo '</h5>';

		echo '<img class="choose" src="https://cdn.dribbble.com/users/3425917/screenshots/6569103/fg.gif" 
		alt="make selection" object-fit="cover"
		top="40%" border="4px solid black" height="10%" width="9%">';
		
		echo '<a href= "Associates.php"/><button class = "Associates">Manage Associates</button></a>';
		echo '<a href= "Quotes.php"/><button class = "Quotes">Manage Quotes</button></a>';
		?>
		</body>
	</html>
