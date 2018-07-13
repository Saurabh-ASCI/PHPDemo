<?php

print("<pre><br/>");
print("<h4>Add backslashes to specified characters : </h4>");
$str = addcslashes("Hello World! test vamshd","l");
echo($str); 

print("<br/>");
print("<h4>join() / implode() and explode(): </h4>");
$arr = array('Hello','World!','Beautiful','Day!');
$arr_to_str = join("#", $arr);
$arr_to_str1 = implode("#", $arr);
#join() is alias to implode()
print("" . $arr_to_str);
print("<br/>" . $arr_to_str1);
$str_to_arr = explode("#", $arr_to_str);
print("<br/>");
print_r($str_to_arr);

print("<br/>");
print("<h4>htmlentities(): </h4>");
$str = '<a href="https://www.w3schools.com">Go to w3schools.com</a>';
echo htmlentities($str);
#convert html element to string

print("<br/>");
print("<h4>substr(string, start, length): </h4>");
#length is optional
$str = "Hello World! This is new World";
print(substr($str, 0, 4));

print("<br/>");
print("<h4>strpos(): </h4>");
print(strpos($str, 'World', 7));
#offset is optional parameter
#stripos() => find the position of first occurrence of case insensitive search
#strrpos() => find the position of last occurrence of search
#strripos() => find the position of last occurrence of case insensitive search

print("<br/>");
print("<h4>trim(): </h4>");
print_r("###" . trim(" test  ")."###");
#trim() removes white spaces from both left and right end of the string
#ltrim() removes white spaces from left end
#rtrim() removes white spaces from right end

print("<br/>");
print("<h4>str_replace() - 1: </h4>");
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP", $count);
print($onlyconsonants);
#no.of replacement performed
print_r("<br/>" . $count);
#use str_ireplace() for case in-sensitive search

print("<br/>");
print("<h4>str_replace() - 2: </h4>");
$arr = array(0=>'a', 1 => 's');
$replaceArr = array("test" => '@', "test2" => '$');
#first element of array is replaced with first element of the replacement array, key do not matters (if matched in string)
print(str_replace($arr, $replaceArr, 'saurabh'));

print("<br/>");
print("<h4>str_replace() - 3: </h4>");
$letters = array('a', 'p', "ea");
$fruit   = array('apple', 'pear', "ea");
$text    = 'a p';
$output  = str_replace(($letters), ($fruit), $text, $count);
echo $output;
print("<br/>");
print($count);

/* 
Replacement of $letters[0], is processed first in the flow -> of array
Replacement steps :
1. a is replaced with apple => apple
2. p in apple is replaced with pear => apearple
3. second p is also replaced with pear => apearpearle
4. then p is replaced with pear => apearpearle pear
See below example for more details
*/

print("<br/>");
/* $search  = array('A', 'B', 'C', 'D', 'E');
$replace = array('B', 'C', 'D', 'E', 'F'); */
$search  = array('C', 'D', 'E','A', 'B');
$replace = array('D', 'E', 'F', 'B', 'C');
$subject = 'A B C';
print(str_replace($search, $replace, $subject));

print("<br/>");
print("<h4>str_ireplace() - Case insensitive matching: </h4>");
print(str_ireplace("world", 'Saurabh', "Hello World"));

print("<br/>");
print("<h4>String equality: </h4>");
$str1 = "testing";
$str2 = 'test';
print($str1 === $str2?'true':'false');

print("<br/>");
print("<h4>strcmp(): </h4>");
$res = strcmp($str1, $str2);
if($res > 0){
    print("$str1 (1) is greater that $str2 (2)");
}elseif($res < 0){
    print("$str2 (2) is greater that $str1 (1)");
}else{
    print("Strings are equal : $str1");
}

print("<br/>");
print("<h4>preg_match(): </h4>");
print_r(preg_match("/test/i", 'this is your test. the test is difficult', $matches, PREG_OFFSET_CAPTURE));
print("<br/>");
var_dump($matches);
#matches and returns offset only for first entry in $matches, while function returns false or true

print("<br/>");
print("<h4>preg_match_all(): </h4>");
print_r(preg_match_all("/test/i", 'this is your test. the test is difficult', $matches, PREG_OFFSET_CAPTURE));
#all 4 letter words
#print_r(preg_match_all("/[a-z]{4}/i", 'this is your test. the test is difficult', $matches, PREG_OFFSET_CAPTURE));
print("<br/>");
var_dump($matches);
#matches and returns offset for all entries in $matches, while function returns no.of matches

print("</pre>");

?>