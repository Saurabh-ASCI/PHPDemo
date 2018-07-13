<?php 

echo "<h1 align='center'> File Handling in PHP </h1>";

$file = fopen("file.txt", "r") or die("Unable to open file");
// echo fread($file, filesize("file.txt")) . "<br/>" 
while (!feof($file))
    echo fgets($file) . "<br/>" ;

fclose($file);

/* 
    Learnings : 

    1. fopen()  returns file pointer
    2. fread() reads whole file at once and exclude \n characters in the file
    3. fgets() reads single line
    4. fgetc() reads the file character by character
    5. r+ mode means read and write and file pointer starts at begining
    6. w+ also means read and write mode, also file pointer starts at begining but it erases the original data. It creates new file if not exists
    7. a+ read/write, existing file data is preserved, file pointer starts at the end of the file, creates new file if not exists
    8. feof() returns if file pointer is at end of the file


*/

?>