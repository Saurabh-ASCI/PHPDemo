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
    }
?>
<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="col-sm-4" style="margin : 0 auto;">
            <br/>
            <div class="card" style="box-shadow: 2px 2px 10px #111">
                <div class="card-body">
                    <form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST">
                        <hr/>                    
                        Username: <input type = "text" name="username" class="form-control" required/>
                        Password: <input type = "password" name = "password" class="form-control" required/>
                        <br/>
                        <input type = "submit" class="btn btn-danger btn-block" value="Login"/>
                        <input type = "reset" class="btn btn-info btn-block" value="Clear"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
    
    <!-- Learnings : 

    1. Variable PHP_SELF to get path from root of the current file
    2. Prevent cross site attacks for form action + PHP_SELF
        use htmlentities() to prevent XSS attacks
     -->
    
</html>
 