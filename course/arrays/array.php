<?php

// -------------my spacing and heading functions:

function spacing()
{
    echo '<br><br>' . '---' . '<br><br>';
}
function heading($heading)
{
    echo "$heading:<br><br>";
}

// -------------printing array

$arr = ['a', 1, true];

echo $arr . "<br>"; // echo doesn't success to print array properly
print_r($arr); //method prints array
spacing();

// --------------name convention, adding elems to arr, arr delete method

$person = [
    'name' => 'Arsen',
    'age' => 28,
    'is_married' => false //the convention is don't use camelcase in key name!!!
];

// $person[] = 'swimming'; // [0] => swimming
$person['hobby'] = 'swimming';
print_r($person);

unset($person['name']); //delete key value pair from array
spacing();
heading('After unset()');
print_r($person);

// ------------array loop
spacing();
heading('array loop');

foreach ($person as $item) {
    echo $item;
}

spacing();
heading('arr in arr and it printing');

$persons = [
    [
        "name" => 'Arsen',
        "age" => 28,
        "is_married" => false,
    ],
    [
        "name" => 'Pavel',
        "age" => 24,
        "is_married" => true,
    ],
    [
        "name" => 'Kate',
        "age" => 33,
        "is_married" => false,
        "courses_passed" => ['course1', 'course2', 'course3'],
    ],
];

foreach ($persons as $person) {
    echo print_r($person) . '<br>';
}

spacing();
heading('one property');

foreach ($persons as $person) {
    echo print_r($person['name']) . "<br>";
}
