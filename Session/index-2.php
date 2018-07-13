<?php

    session_start();
    if(isset($_SESSION['user'])){
        echo "Session is set => " . $_SESSION['user'];
        session_unset();
    }else{
        echo "Session is not set";
    }
  
/* 
Learnings : 

1. Session need to start before use of its variables
2. session_start() to start the session
3. session_destroy() will destroy the session and set variables
4. session_unset() will unset all the session variables
5. $_SESSION['key'] is used for setting or getting values in/from session
6. Every session has timeout value, you can adjust timeout value in php.ini config file

*/    


?>