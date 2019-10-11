<?php

session_start();


$loggedIN = 0;

if (isset($_COOKIE['sessionid']) &&  $_SESSION['loggedin'] == 1)
{

    $loggedIN = 1;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">

    <script src="send.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


     <style scoped>

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
            background: rgb(66, 184, 221); /* this is a light blue */
        }

        .message-success-text {
              color: #12cf08;
              font-family: Helvetica, Arial, sans-serif;
              font-size: 13px;
              font-weight: bold;
              line-height: 20px;
}

.error-message {
  background-color: #6eb4ff;
  border: 1px solid #005ec2;
  float: center;
  padding: 20px 30px;
}

.error-text {
  color: #000000;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 26px;
  font-weight: bold;
  line-height: 20px;
  align: center;
  text-shadow: 1px 1px rgba(250,250,250,.3);
}
    </style>



    <script>

        $.ajax({
            url:'token.php',
            type:'POST',
            data:{ generateNow:"set" },
            success:function(data)
            {
                // getting the token from ajax response and storing it in the hidden field
                document.getElementById("csrf").value = data;
            }
        });
    </script>
</head>
<body>
    <?php if($loggedIN == 1) { ?>
	<form action="process.php" method="POST" class="pure-form pure-form-stacked" style="padding:3em;" onsubmit="return send();">
    <fieldset>
        <legend><h1>SEND CREDITS</h1></legend>

        <label>Enter Credit Amount</label>
        <input id="amount" name="amount" type="text" placeholder="Enter Value">
        <!-- <span class="pure-form-message">This is a required field.</span> -->
    <br>

        <input type="hidden" name="csrf" id="csrf" value=""/>

        <button type="submit" class="button-success pure-button">Send</button>

        <button type="button" class="pure-button button-error" onclick="window.location.href='logout.php'">Log out</button>
    </fieldset>
</form>

<span>
<div class="error-message">
<span class="error-text" id="msg"></span>
</div>
</span>

<!-- <script type="text/javascript">

    $(document).ready(function(){
    $("#submit").click(function(){
        var amount = $("#credit").val()
        var csrf = $("#csrf").val()

            $.ajax({
                url:'process.php',
                type:'post',
                data:{
                  amount:amount,
                  csrf:csrf
                },
                success:function(response){
                    $('#msg').html(response);
                }
            });

        return false;

    });
});




</script> -->

<?php } else { ?>

    <h1 style="padding:3em;"> You are not logged in </h1>

    <form action=login.php style="padding:3em;">
                <button type="submit" class="pure-button button-primary"> Log In </button>
            </form>

<?php } ?>



</body>
</html>
