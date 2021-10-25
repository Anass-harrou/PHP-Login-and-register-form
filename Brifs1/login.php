<?php

    $errors=array("email"=>'',
                "password"=>''
    );

    $pass=$user="";
    if(isset($_POST["submite"])){
        if(empty($_POST["username"])){
        }else{
            $user=htmlspecialchars($_POST["username"]);
        }
            
        if(empty($_POST["password"])){
        }else{
            $pass=htmlspecialchars($_POST["password"]);
            $passsh=md5($pass);
        }

        if(!array_filter($errors)){ 
            include("sql_conection.php");
            $query="select * from users where Email='$user' and Password='$passsh' limit 1";
            $resultat=mysqli_query($conn,$query);
            if(mysqli_num_rows($resultat)==1)
            {
                header("Location:home.php");
                $_SESSION["userName"]=$user;
            }                
            else
                echo '<h2 class="er">User Name Or Password incorrect !!!</h2>';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
<style>
/* Bordered form */
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
</style>
    <div class="container">
        <form action="login.php" method="post">
            <h1>LOGIN</h1>
            <label for="userName">Email address :</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user); ?>" placeholder="Enter Your User Name :" required/>
            <h3 class="error"><?php echo $errors["email"]; ?></h3>
            <label for="password">password :</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($pass); ?>" placeholder="Enter Your Password :" required/>
            <h3 class="error"><?php echo $errors["password"];  ?></h3>
            <a href="signup.php" id="register" >create account ?</a>
            <button type="submit" name="submite" id="btnsub" value="Login" required>Login
                
        </form>
    </div>

</body>
</html>