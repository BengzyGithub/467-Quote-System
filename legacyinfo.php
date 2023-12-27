<?php
    $servername = 'blitz.cs.niu.edu';
    $username = 'student';
    $password = 'student';
    $db = 'csci467';

    $username2 = 'z1726017';
    $password2= '1996May14';

    if (session_id() == "") 
    {
        session_start();
    }

    if(!isset($_SESSION['id']))
    {
        header("location:index.html");
    }
?>




