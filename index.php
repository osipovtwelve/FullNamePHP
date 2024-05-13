<?php
// Подключение файла array.php
include 'array.php';

// Создание цикла, выводит элементы пока значение $i меньше значений в массиве, прибавляя каждый раз на 1
for ($i = 0; $i < count($example_persons_array); $i++) {
    $check = $example_persons_array[$i]['fullname'] . '<br>';
    getPartsFromFullname($check);
}

// Объединение ФИО

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

// Разбиение ФИО

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
    getShortName($fname);
    getGenderFromName($fname);
    // Вывод разделенного элементов массива
    print_r($fname);
}


// Сокращение ФИО

function getShortName($fname)
{
    // Присваиваем Фамилию переменной $fam
    $fam = "$fname[0]";
    // Сокращаем значение переменной $fam до одного символа
    $fam = mb_substr($fam, 0, 1);
    // Присваиваем переменной $sokr Имя и сокращенную фамилию из переменной $fam
    $sokr = "$fname[1] $fam.";
    echo $sokr;
}

// Функция определения пола по ФИО

function getGenderFromName($fname) // внутри функции делим ФИО на составляющие с помощью функции getPartsFromFullname;
// Она уже разделена в функции getPartsFromFullname просто передаем аргумент $fname
{
    $gender = 0; // изначально «суммарный признак пола» считаем равным 0;
    $gender1 = "Мужской";
    $gender2 = "Женский";

    // если присутствует признак женского пола — отнимаем единицу.
    if (str_ends_with($fname[2], 'вна')) {
        $gender--;
    } elseif (str_ends_with($fname[1], 'а')) {
        $gender--;
    } elseif (str_ends_with($fname[0], 'ва')) {
        $gender--;
    }
    // если присутствует признак мужского пола — прибавляем единицу;
    if (str_ends_with($fname[2], 'ич')) {
        $gender++;
    } elseif (str_ends_with($fname[1], 'й') || str_ends_with($fname[1], 'н')) {
        $gender++;
    } elseif (str_ends_with($fname[0], 'в')) {
        $gender++;
    }
    // после проверок всех признаков, если «суммарный признак пола» меньше нуля — возвращаем -1 (женский пол);
    if ($gender < 0) {
        echo $gender2;
        echo $gender; // Проверка что $gender < 0
    }
    // после проверок всех признаков, если «суммарный признак пола» больше нуля — возвращаем 1 (мужской пол); 
    elseif ($gender > 0) {
        echo $gender1;
        echo $gender; // Проверка что $gender > 0
    }
    // после проверок всех признаков, если «суммарный признак пола» равен 0 — возвращаем 0 (неопределенный пол).
    elseif ($gender == 0) {
        echo "Неопределенный пол";
        echo $gender; // Проверка что $gender == 0
    }
}
