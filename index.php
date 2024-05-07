<?php
// Подключение файла array.php
include 'array.php';

// Создание цикла, выводит элементы пока значение $i меньше значений в массиве, прибавляя каждый раз на 1
for ($i = 0; $i < count($example_persons_array); $i++) {
    $check = $example_persons_array[$i]['fullname'] . '<br>';
    getPartsFromFullname($check);
}
/*
getPartsFromFullname принимает как аргумент одну строку — склеенное ФИО. Возвращает как результат массив из трёх элементов с ключами ‘name’, ‘surname’ и ‘patronomyc’.
Пример: как аргумент принимается строка «Иванов Иван Иванович», а возвращается массив [‘surname’ => ‘Иванов’ ,‘name’ => ‘Иван’, ‘patronomyc’ => ‘Иванович’].
*/

function getPartsFromFullname($check)
{

    // Разъединение строки из массива
    $fname = explode(' ', $check);
    // Запуск функции
    getFullnameFromParts($fname);
    // Вывод разделенного элементов массива
    print_r($fname);
}

/*
getFullnameFromParts принимает как аргумент три строки — фамилию, имя и отчество. Возвращает как результат их же, но склеенные через пробел.
Пример: как аргументы принимаются три строки «Иванов», «Иван» и «Иванович», а возвращается одна строка — «Иванов Иван Иванович».
*/

function getFullnameFromParts($fname)
{

    // Склеивание элементов Фамилия[0] Имя[1] Отчество[2]
    $new = "$fname[0] $fname[1] $fname[2] ";
    // Вывод склееного имени
    echo $new;
}
