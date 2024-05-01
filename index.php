<?php

function getPartsFromFullname (){
// Подключение файла array.php
include 'array.php';
$check = $example_persons_array[0]['fullname'];
// Разъединение строки из массива
$fname = explode(' ', $check);
    $surname = $fname[0];
    $name = $fname[1];
    $patronymic = $fname[2];

    print_r($fname);

function getFullnameFromParts ($surname,$name,$patronymic){
    getPartsFromFullname();
$new = implode(' ', $surname,$name,$patronymic);
print_r($surname);
}

}

getPartsFromFullname();
?>