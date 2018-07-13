<?php 
echo "<pre>";

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
#array_column()
print("<br/>");
print("<h4>Fetching only firstnames using array_column()</h4>");
$firstnames = array_column($multi_arr, 'firstname');
print_r($firstnames);

#array_map()
print("<br/>");
print("<h4>Cube of every element of an array using array_map()</h4>");
$a = [1,2,3,4,5,6,7,8,9];
function cube($n){
    return $n ** 3;
}
$new_arr = array_map('cube', $a);
print_r($new_arr);

#square using lambda function and array_map()
print("<br/>");
print("<h4>Square of every element of an array using array_map() and lambda function</h4>");
$a = [1,2,3,4,5,6,7,8,9];
//lambda function
$square = function($n){
    return $n ** 2;
};
$new_arr = array_map($square, $a);
print_r($new_arr);

#array_filter()
print("<br/>");
print("<h4>Get records where lastname == Lende, using array_filter()</h4>");
function lastname_filter($element){
    // print_r($element);
    // print($element['lastname']);
    if($element['lastname'] == 'Lende'){
        return true;
    }else{
        return false;
    }
}
// $result = array_filter($multi_arr, "lastname_filter");
//can pass inline function like Javascript
$result = array_filter($multi_arr, function($element){
    return $element['lastname'] == 'Lende';
});
print_r($result);
#if no function is passed as callback to array_filter() then same array is returned except falsy values in array


#php default value
print("<br/>");
print("<h4>PHP default value of variable : </h4>");
$test;//default value
$test++;//1
$test++;//2
print(" ** " . $test);

print("<br/>");
print("<h4>array_flip() to flip key and values of an array : </h4>");
print_r(array_flip($firstnames));

print("<br/>");
print("<h4>array_intersect() to get intersection of two arrays : </h4>");
$a = [1,78,2,3,4,5,6,7,8,9];
$b = [0,2,6,10,11,13];
$c = [13, 2];
$intersection = array_intersect($a, $b, $c);
print_r($intersection);

print("<br/>");
print("<h4>array_intersect_assoc() to get intersection of two associated arrays : </h4>");

$multi_arr1 = array(
    'first' => array(
        "age" => 24,
        "firstname" => 'Saurabh',
    ),
    "second" => array(
        "age" => 27,
        "firstname" => "Nikhil",
    ),
    "forth" => array(
        "age" => 28,
        "firstname" => "test",
    )
);

$arr3 = array(
    'first' => array(
        'foo' => 'bar'
    )
);

// print_r(array_intersect($multi_arr, $multi_arr1, $arr3)); // this will returns first array
print_r(array_intersect_assoc($multi_arr, $multi_arr1, $arr3));

print("<br/>");
print("<h4>array_key_exists() to get check keys in array : </h4>");
print_r(array_key_exists('first', $multi_arr));

print("<br/>");
print("<h4>array_key_exists() vs isset(): </h4>");
$search_array = array('first' => NULL, 'second' => 4);
print("isset() : ".isset($search_array['first']));//false for null value
print("<br>array_key_exists() : ".array_key_exists('first', $search_array)); //true if key exists

print("<br/>");
print("<h4>in_array() to check value in array exists or not: </h4>");
$arr = [1,2,3,4,5,6];
print(in_array('3', $arr));

print("<br/>");
print("<h4>array_merge() vs array_merge_recurisve(): </h4>");
print_r(array_merge($multi_arr, $arr3));
print("<hr>");
print_r(array_merge_recursive($multi_arr, $arr3));

print("<br/>");
print("<h4>array_pad() : </h4>");
#array size is 20 and fill empty fields with 'test' (right padding)
print_r(array_pad($a, 9, 'test'));
#array size is 20 and fill empty fields with 'test' and added before existing elements (left padding)
print_r(array_pad($a, -20, 'test'));

print("<br/>");
print("<h4>array_pop() & array_push(): </h4>");
print("Pop() value : " . array_pop($a) . "<br/>" . "<br/>Adding 21,31 in current array <br/>");
array_push($a, 21,31);
print_r($a);

print("<br/>");
print("<h4>array_product(): </h4>");
print_r($a);
print("Product : " . array_product($a));

print("<br/>");
print("<h4>array_rand(): </h4>");
#array_rand() picks random keys not random values associated with the keys
print_r(array_rand($multi_arr['first'], 2));

print("<br/>");
print("<h4>shuffle(): </h4>");
shuffle($a);
print_r($a);

print("<br/>");
print("<h4>array_reduce(): </h4>");
$res = array_reduce($a, function($accumulator, $item){
    return $accumulator = $accumulator + $item;
}, 0);
//same as javascript reduce()
print("Addition : " . $res);

print("<br/>");
print("<h4>array_unique(): </h4>");
$arr = array(4,'4','4',3,"3");
$unique_values = array_unique($arr, SORT_STRING);
var_dump($unique_values);

print("<br/>");
print("<h4>array_replace(): </h4>");
$b = array(
    0 => 55,
    9 => 66
);
$c = array(
    0 => 77,
    1 => 88
);
print_r($c);
print_r($b);
print_r($a);
$res = array_replace($a, $b, $c);
print_r($res);

print("<br/>");
print("<h4>array_reverse(): </h4>");
print_r(array_reverse($res, true));
# default : FALSE => don't preserve keys
# TRUE => preserve keys

print("<br/>");
print("<h4>array_search(): </h4>");
print_r($res);
print_r(array_search(2, $res, true));
#returns index if found, else returns false
#strict default : FALSE - it do not compare types
#if strict TRUE - it do compare type of needle with array values

print("<br/>");
print("<h4>array_shift() and array_unshift(): </h4>");
print_r($res);
print_r(array_shift($res));
print("<br/>");
#shift removes first element

print_r(array_unshift($res, '111', '222', 0));
print("<br/>");
print_r($res);
#unshift add at first and returns size of array

print("<br/>");
print("<h4>array_values(): </h4>");
$test = array("size" => "XL", "color" => "gold");
print_r(array_values($test));
#only returns values not keys

print("<br/>");
print("<h4>array_walk() & array_walk_recursive(): </h4>");
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
array_walk($fruits, function($item, $key){
    print("$key-$item<br/>");
});
#you can also add prefix in this

print("<br/>");
array_walk($multi_arr, function($item, $key){
    print("$key-$item<br/>");
});

print("<br/>");

#for multidimesional array use array_walk_recursive()
array_walk_recursive($multi_arr, function($item, $key){
    print("$key-$item<br/>");
});

print("<br/>");
print("<h4>array_slice() : </h4>");
$input = array("a", "b", "c", "d", "e");
$output = array_slice($input, 2, 2);
print_r($output);
#like javascript

print("<br/>");
print("<h4>array_splice() : </h4>");
$input = array("red", "green", "blue", "yellow", "yellow1", "yellow2", "yellow3", "yellow4");
print_r(array_splice($input, 2, -2, array('test', 'new_test')));
print_r($input);
#Note : Same as javascript except splice() in javascript do not remove if -ve value provided as no.of items to remove
#while in php splice remove element even if -ve value is passed
#Example : splice($input, 2, -2) this will get offset 2, and remove all the elements from that offset upto last 2 elements as specified -2.
 

#array_multisort()

echo "</pre>";
?>