<?php
session_start();
$conn = new PDO('mysql:host=127.0.0.1;dbname=trainee','root','');

//echo "POST['login'] : ".$_POST['login'];

if (isset($_POST['username'])){
$username = $_POST['username'];
$password = $_POST['password'];


$query = $conn->prepare("SELECT COUNT('id') as num FROM users WHERE username = '$username' AND password ='$password'");
$query->execute();

while($row = $query->fetch(PDO::FETCH_ASSOC) ) {    
    $count = $row['num'];
}


//var_dump($count);

if ($count == "1"){
    $_SESSSION['username'] = $username;
    header ('location: login.php');
    }
}
else
{
    echo "Can not log in";
}
?>


<html>
<head>
<title>index</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div style="width: 500px; margin: 50px auto;">
            <!--form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">-->
            <form method="post" action="" autocomplete="off">
                <center><h2>Login</h2></center>
                <hr/>
                <?php
                    if(isset($errorMsg)){
                        ?>
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span>
                            <?php echo $errorMsg; ?>
                        </div>
                        <?php
                    }
                ?>
                <div class="form-group">
                    <label for="text" class="control-label">Username</label>
                    <input type="text" name="username" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
                </div>
                <div class="form-group">
                    <center><input type="submit" name="btn-login" value="Login" class="btn btn-primary"></center>
                </div>
                <hr/>
              
            </form>
        </div>
    </div>
</body>
</html>