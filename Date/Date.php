<?php

print("<pre><br/>");
print("<h4>date() : </h4>");
print("<br/>Date : " . date("r"));//full date
print("<br/>Date : " . date("d/m/Y"));//full datewith format 28/06/2018
print("<br/>Day : " . date("d"));//01-31
print("<br/>Day : " . date("j", mktime(7,0,0,9,9,2018)));//1-31
print("<br/>Day : " . date("D"));//Mon-Sun
print("<br/>Month : " . date("m"));//01-12
print("<br/>Month : " . date("M"));//Jan-Dec
print("<br/>Year : " . date("Y"));//2018
print("<br/>Year : " . date("y"));//18
print("<br/>Leap : " . date("L"));//1/0 according to leap year
print("<br/>Time : " . date("H:i:s:A"));//00:00:00:AM

print("<br/>");
print("<h4>time() : </h4>");
print("<br/>Timestamp : " . time());
/* $timezone_identifiers = DateTimeZone::listIdentifiers();
foreach($timezone_identifiers as $key => $list){
    echo $list . "<br/>";
} */

print("<br/>");
print("<h4>mktime(hour, minute, second, month, day, year) : </h4>");
$birthday_time_stamp = mktime(7,0,0,3,30,1994);
// echo mktime(0,0,0,10,13,2025);
print($birthday_time_stamp);
#check if birth year is leap or not
if(date("L", $birthday_time_stamp)){
    print("<br/>" . "Leap Year");
}else{
    print("<br/>" . "Not Leap Year");
}

#date_add
print("<br/>");
print("<h4>date_add(), date_sub() and date_diff() : </h4>");
$date = new DateTime('2000-01-01');
echo $date->format('r');
print("<br/>");
print($date->format('r'));
print("<br/>");

$date->add(new DateInterval('P1Y1MT2H20S'));
echo $date->format('r') . "\n";

$new_date = new DateTime('2009-10-11');

$interval = $new_date->diff($date);
echo $interval->format('%H:%I:%S- %R%Y'.' years');
#or
echo "<br/>or<br/>";
echo $interval->format('%H:%I:%S- %R%a'.' days');

echo "<br/>";
#array_sub()
print_r($date->sub(new DateInterval('P1MT2H20S'))->format('r'));

echo "<br/>";
echo "<h4>strtotime() : </h4>";
print_r(strtotime("10 minute ago"));
print_r("  " . date('r', strtotime("10 minute ago")));

echo "<br/>";
echo "<h4>date_parse() : </h4>";
#parse string (valid date string) to array containing info about date
var_dump(date_parse('Thu, 01 Feb 2001 02:00:20 +0530'));

echo "<br/>";
echo "<h4>checkdate(month, day, year) : </h4>";
var_dump(checkdate(03,30,1994));

echo "<br/>";
echo "<h4>date_modify() : </h4>";
var_dump($new_date);
#adding 1 year and 1 month
$new_date->modify('+1 month +1 year');
var_dump($new_date);

print("</pre>");

#time zones in php date
?>