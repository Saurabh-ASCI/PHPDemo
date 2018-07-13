<html>
<head>
    <title>
        Basic PHP
    </title>
</head>
<body>

    <?php 
        print("PHP Working");
        function sum(int ...$ints){
            print_r($ints);
            return array_sum($ints);
        }
        print("<br/>");
        print(sum(2 , '3', 5.9));
    ?>
    <hr/>
    <?php
        print "This spans
        multiple lines. The newlines will be
        output as well";
        print("<br/>");  
        #php is white space insensitive
        $a = 2;
        $b=3;
        $sum = 
        $a 
        **
        $b;
        print_r($sum);
        print("<hr/>");  

        $test = 222;
        print('This is current value of test : $test');
        print("<br/>This is current value of test : $test");

    ?>
    <hr/>
    <?php
    #constants
        define("MINSIZE", 50);
        
        echo MINSIZE;
        echo "<br/>";
        echo constant("MINSIZE"); // same thing as the previous line
        echo "<hr/>";
        #date
        $date = date("D-M-Y");
        print("Date : $date");
        echo "<hr/>";

        #foreach
        $arr = array(10,20,30,4, 112, 1233, 45, 67, 89);
        $count = 0;
        foreach($arr as $val){
            if($val == 30){
                echo "Continue!!<br>";
                continue;
            }
            if($val == 67){
                echo "Breaking Bad !!<br>";
                break;
            }
            echo "Count : $count, Value : $val <br/>";
            $count ++;
        }
    ?>
    

</body>
</html>