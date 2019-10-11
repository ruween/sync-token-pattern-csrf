<?php

$user = "root";   //hard coded password and username is 'root'
$pass = "root";

session_start();

$username = $_POST['username'];
$password;
$loginToken;
$message;


if (isset($_SESSION['logintoken'])){       //passing the token created for the loggin session in to a fixed variable
    $loginToken = $_SESSION['logintoken'];
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['token'])) //checking whether the inputs are set
{

    if ($loginToken == $_POST['token']) //comparing the POST-ed token with the created token to verify
    {

        if ($_POST['username'] == $user && $_POST['password'] == $pass) //checking credetials
        {

            $sessionID = session_id();
 	          setcookie('sessionid', $sessionID, time() + 3600, '/'); //creating a session cookie


            $_SESSION['loggedin'] = 1; //setting loggedin as true


            header("Location: mainpage.php"); //redirecting to the main page


            unset($_SESSION['logintoken']); //releasing the login token
        }

        else
            $message = "Invalid Credentials";  //error control
    }
    else{die('INVALID REQUEST');}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">

<style type="text/css">


.button-success,
.button-error,
.button-warning,
.button-secondary {
    color: white;
    border-radius: 4px;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}

.button-success {
    background: rgb(28, 184, 65); /* this is a green */
}

.button-error {
    background: rgb(202, 60, 60); /* this is a maroon */
}

.button-warning {
    background: rgb(223, 117, 20); /* this is an orange */
}

.button-secondary {
    background: rgb(158, 79, 255); /* this is a light blue */
}

.message-success-text {
      color: #12cf08;
      font-family: Helvetica, Arial, sans-serif;
      font-size: 13px;
      font-weight: bold;
      line-height: 20px;
}
  .error-message {
  background-color: #fce4e4;
  border: 1px solid #fcc2c3;
  float: left;
  padding: 20px 30px;
}

.error-text {
  color: #000000;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 28px;
  font-weight: bold;
  line-height: 20px;
  text-shadow: 1px 1px rgba(250,250,250,.3);
}
</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

  <!-- in case if the credentials are wrong, show this to take the user back to login -->

    <div class="pure-u-1-3" style="padding: 3em;">
        <p class="error-text"> <?php echo $message ?> </p>
      <button type="button" class="pure-button button-secondary" onclick="window.location.href='login.php'">Log In</button>
    </div>

</body>
</html>
