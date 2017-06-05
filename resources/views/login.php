<?php
session_start();

echo "welcome".$_SESSION['username'];
if (isset($_POST['logout'])){
    session_start();
    session_destroy();
    header('location:index.php');


    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>log in</title>
</head>
    <body>

        <form method ="post" name="logout">
    
                <input type="submit" name="logout" value ="log me out">
        </form>
    </body>
</html>