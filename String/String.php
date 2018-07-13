<?php

    echo "<h2> String Operations</h2>";
    $str1 = "Saurabh";
    $str2 = "Lende";
    // concatination of string
    $concat_str = $str1 . ' ' . $str2;
    print("$concat_str");
    
    print("<hr/>");

    #length of the string : strlen()
    print("Length of <b>$str1</b> is <b>" . strlen($str1) . "</b>");
    print("<br>Length of <b>$str2</b> is <b>" . strlen($str2) . "</b>");
    print("<br>Length of <b>$concat_str</b> is <b>" . strlen($concat_str) . "</b>");

    #searching in the string : strpos() 
    print("<hr/>");
    $search = strpos($concat_str, $str2);
    echo "Searching in <b>$concat_str</b> for <b>$str2</b> will retruns <b>$search</b> as starting index";
    #Note that strpos() is case sensitive search
    print("<hr/> Lowercase only first character : lcfirst()");
    print("<br/>" . lcfirst($concat_str));
    print("<hr/> Lowercase whole string : strtolower()");
    print("<br/>" . strtolower($concat_str));
    #same for uppercase
    #ucfirst() and strtouper()
    #to covert every first letter of each word in string to uppercase use 
    #ucwords()
    $text = "this is sparta !";
    print("<hr/> " . $text . " => " . ucwords($text));

    #regular expressions
    print("<hr/>");
    $string = " Next get the name of the useragent yes seperately and useragent for good reason";
    if(preg_match('/UserAgent/i', $string)){
        print("User Agent string present in \$string " .preg_match('/User Agent/i', $string));
    }

?>