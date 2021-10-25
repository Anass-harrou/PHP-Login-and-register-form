<?php

    $user=$email=$pass="";

    if(isset($_POST["submite"])){
        if(empty($_POST["username"])){
        }else{
            $user=htmlspecialchars($_POST["username"]);
        }
    
        if(empty($_POST["email"])){
        }else{
            $email=htmlspecialchars($_POST["email"]);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors["email"]="Invalide Email Adresse !!!";
            }
        }
    
        if(empty($_POST["password"])){
        }else{
            $pass=htmlspecialchars($_POST["password"]);
            $passhash=md5($pass);
        }



            include('sql_conection.php');

            $sql="insert into users(username,email,password) values('$user','$email','$passhash')";

            $res=mysqli_query($conn,$sql);
            echo '<script>alert("Acount creer avec success .");</script>';

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

</head>
<body>
<style>
    /* Bordered form */
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password],input[type=email] {
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
    <div class="container1">
        <form action="signup.php" method="post">
            <h1>Regsiter</h1>
                <label for="username">User Name :</label>
                <input type="text" id="username" name="username" placeholder="Enter Your User Name :" value="<?php echo $user; ?>" required/>
          
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Enter Your Email :" value="<?php echo $email; ?>" required/>
                <label for="password">password :</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password :" value="<?php echo $pass; ?>" required/>
                
                <a href="login.php" id="connexion" class="connexion" ></a>
                <button type="submit" name="submite" id="btnsubr" value="Register">Signup </button>
                    <br> <br>
                <div><span style="text-align: right;">Already have an account?<a href="login.php">Login</a></span></div>
        </form>
    </div>

    <?php
        if(isset($_POST['submite']))
        {
            header("Location:login.php");
        }
    
    ?>



</body>
</html>