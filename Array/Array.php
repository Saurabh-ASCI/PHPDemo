<?php
    echo "<pre> <h2>Associative Array</h2>";
    echo "<hr/>";
    $assoc_array['foo'] = 'bar';
    $assoc_array[0] = 'test';
    print_r($assoc_array);
    print("<br/>" . $assoc_array['foo']);
    print("<br/>" . $assoc_array[0]);
    
    echo "<hr/>";
    echo "<h2> Multi-Dimensional Array </h2>";
    $multi_arr = array(

        'first' => array(
            "age" => 24,
            "firstname" => 'Saurabh',
            "lastname" => "Lende",
        ),
        "second" => array(
            "age" => 27,
            "firstname" => "Nikhil",
            "lastname" => "Lende",
        ),
        "third" => array(
            "age" => 28,
            "firstname" => "test",
            "lastname" => "user",
        )

    );

    $parent_keys = array_keys($multi_arr);

    for($j=0; $j < count($multi_arr); $j++){
        print("<b>Key : $parent_keys[$j]</b> => ");
        $keys = array_keys($multi_arr[$parent_keys[$j]]);
        for($i = 0; $i < count($keys); $i++){
            echo "<br/>" . $keys[$i] . " => " . $multi_arr[$parent_keys[$j]][$keys[$i]];
        }
        print("<br/>########################################<br/>");
    }
    echo "<hr/>";
    
    #Array Change Key - Case
    print_r(array_change_key_case($multi_arr, CASE_UPPER));
    
    #array_chunk
    echo "<hr/>";
    $arr1 = [1,2,3,4,5,6];
    $chunk = array_chunk($arr1, 2);
    print_r($arr1);
    print("<br/>");
    print_r($chunk);
    
    #array_column
    echo "<hr/>";
    $first_names = array_column($multi_arr, 'firstname');
    print_r($first_names);
    print("<br/>");
    #array_column to change index, associative array
    $first_names = array_column($multi_arr, 'firstname', 'age');
    print_r($first_names);
    //output : Array ( [24] => Saurabh [27] => Nikhil [28] => test )

    #array sort()
    print("<hr/>");
    print_r($multi_arr);
    #asort() only checks for first values of every child element
    print_r(asort($multi_arr));
    print("<br/>");
    print_r($multi_arr);

    #counting values
    print("<hr/>");
    $lastnames = array_column($multi_arr, 'lastname');
    print("<br/>");
    $countValues = array_count_values($lastnames);
    print_r($countValues);

    #array map
    print("<hr/>");

    $a = [1,2,3,4,5,6,7,8,9];
    function square($n){
        return $n ** 2;
    }
    print_r($a);
    echo "<br/>";
    $sq = array_map("square", $a);
    print_r($sq);

    print("<hr/>");


    echo "</pre>";
?>