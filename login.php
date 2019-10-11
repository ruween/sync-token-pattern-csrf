

 <?php


//starting session
session_start();


  if(isset($_COOKIE["sessionid"]) && isset($_SESSION["loggedin"])){

    header("Location: mainpage.php");  //if a session has started redirect to the mainpage
}

// generating a random token value

$_SESSION['logintoken'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32);




//   session_start();



//   if(isset($_COOKIE["sessionid"]) && isset($_SESSION["loggedin"])){

//     header("Location: mainpage.php");
// }


//  require_once("token.php");

//      $_SESSION['CSRF'] = generateToken();
//      $loginToken = $_SESSION['CSRF'];




  // if (isset($_POST["username"], $_POST["password"])) {

  //   $username = $_POST["username"];
  //   $passoword = $_POST["password"];

  // if (!empty($username) && !empty($password)) {
  //   // if (Token::check($_POST['token'])) {
  //     echo 'OK';
  // //

  // }

  // }



 ?>





<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<style type="text/css">
  .error-message {
  background-color: #fce4e4;
  border: 1px solid #fcc2c3;
  float: left;
  padding: 20px 30px;
}

.error-text {
  color: #cc0033;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 13px;
  font-weight: bold;
  line-height: 20px;
  text-shadow: 1px 1px rgba(250,250,250,.3);
}
</style>


</head>
<body>

  <form class="pure-form pure-form-stacked" style="padding:3em;" action="loginvalidation.php" method="POST">
      <fieldset>

  <legend>
      <h1>Synchronizer token pattern</h1>
      <h2>Login Form</h2>
    </legend>

          <span class="error-text" id="message"></span>
          <span class="error-text" id="message"></span>

          <label for="username">Username</label>
          <input id="username" name="username" type="text" placeholder="Username">


          <label for="password">Password</label>
          <input id="password" name="password" type="password" placeholder="Password">


        <input type="hidden" id='token' name="token" value="<?php echo $_SESSION['logintoken']; ?>">

<br>
          <button type="submit" name="submit" id='submit' class="pure-button pure-button-primary">Log in</button>
      </fieldset>
  </form>
</body>


</html>
