<?php
    include "sql_conection.php";

    if(empty($_SESSION["userName"])){
        header("Location:login.php");
    }
    $user=$_SESSION["userName"];

    $sql="select * from users where email='$user' limit 1";
    $resultg=mysqli_query($conn,$sql);

    if(mysqli_num_rows($resultg)==1){
        $users=mysqli_fetch_all($resultg,MYSQLI_ASSOC);
        foreach($users as $k){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <nav>
        <div class="logo">
            <img src="images/images.png" alt="logo">
        </div>
        <a href="logout.php">logout ?</a>
    </nav>
    <div class="homecontainer">
        <div class="text">
            <h2>Hello</h2><br>
            <h1>Welcom in Home page<br><span><?php echo $k["username"];  ?></span></h1>
        </div>
    </div>
    <div class="footr" style="text-align:center;position: absolute;bottom: 0;left: 0;background: rgba(138, 165, 240, 0.54);width: 100%;padding:.5rem;">
        <h3>&copy; 2020 - <?php echo date("Y"); ?> | Anass</h3>
    </div>

    <?php
        }
    }   
    ?>

</body>
</html>