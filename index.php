<?php
// Подключение файла array.php
include 'array.php';
$check = $example_persons_array[0]['fullname'];

function getPartsFromFullname ($check){

// Разъединение строки из массива
$fname = explode(' ', $check);
print_r($fname);

getFullnameFromParts($fname);

}


function getFullnameFromParts ($fname){

    $surname = $fname[0];
    $name = $fname[1];
    $patronymic = $fname[2];

    $new = "$surname $name $patronymic";
    print_r($new);
    }

getPartsFromFullname($check);

?>