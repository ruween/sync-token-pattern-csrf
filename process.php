<?php
session_start();

$csrf = $sid = "";

// print_r($_POST);

if (isset($_POST['csrf']))
{
    if (!isset($_SESSION["mappedCookie"])){ $message = "Session has expired. Try Again"; }

    elseif (isset($_SESSION["mappedCookie"]))
    {
        $mapArray = explode (":", $_SESSION["mappedCookie"]);

        $csrf = $mapArray[0];
        $sid = $mapArray[1];  //seperating the csrf token and the session cookie from the mapped Cookie
    }
    if ($csrf != $_POST['csrf'])
    {
        //$messege = "csrf ". $csrf ." is equal to ". $mapArray[0] ." & ". $mapArray[1] ." post ". $_POST['csrf'] ;
        $message = "CSRF Token Mismatch, Invalid Request";
    }

    elseif ($sid != $_COOKIE['sessionid'])
    {
        $message = "Invalid cookie.";    //comparing the current session id with the extracted one
    }
    else
    {
        $message = $_POST["amount"]." credited to Agent47";
    }
}
else
{
    $message = "Invalid Request";
}

echo $message;

unset($_SESSION['mappedCookie']);

?>
