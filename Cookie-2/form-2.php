<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    // echo "<h1 align='center'>LOGIN FORM </h1> <br/>";
    if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
        // var_dump($_POST);
        // var_dump($_REQUEST);

        // setcookie(name, value, expire, path, domain, security);
        setcookie("user[cookie_user]", $_REQUEST['username'], time()+60);//expire after one minute
        setcookie("user[cookie_pass]", $_REQUEST['password'], time()+60);//expire after one minute
        echo json_encode($_REQUEST);
        
        exit();//exits from the current script
    }elseif(isset($_COOKIE['user'])){
        echo "Cookie is set - Username : " . $_COOKIE['user']['cookie_user'];
        echo "<br/>";
        echo "Cookie is set - Password : " . $_COOKIE['user']['cookie_pass'];

        //to delete cookie
        // setcookie("user[cookie_user]", $_REQUEST['username'], 1);
        // setcookie("user[cookie_pass]", $_REQUEST['username'], 1);
        exit();
    }else{
        header("Location: http://localhost/PHP/form-2.html"); /* Redirect browser */
        exit();
    }
   
    /* 
    Learnings : 

    1. set cookie : headers ('Set-Cookie' : 'string')
        or using setcookie(name, value, expire, path, domain, security)
    2. $_GET, $_POST, $_COOKIE and $_REQUEST
    3. To delete or unset cookie
        setcookie('key', 'value', 1);
        or pass previous timestamp to delete that cookie
    */

?>
