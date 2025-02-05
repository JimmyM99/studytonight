<?php
/**
 * array_push
 * array_flip
 * in_array
 * array_pop
 */

function print_array($a = [])
{
    foreach ($a as $num) {
        echo $num . ",";
    }
}

function push_array($val, $a = [])
{
    $length = sizeof($a);
    $a[$length] = $val;
    return $a;
}



function flip($a = [])
{
    $keys = array_keys($a);
    $values = array_values($a);

    for ($i = 0; $i < sizeof($a); $i++) {
        $flipped[$values[$i]] = $keys[$i];
    }

    return $flipped;
}

function exists_in_array($element, $array = [])
{
    $result = null;
    foreach ($array as $c) {
        if ($element === $c) {
            $result = true;
            break;
        } else {
            $result = false;
        }
    }
    return $result;
}

function exists_text($a,$b=[]){
    if (exists_in_array($a, $b)) {
        echo "$a is in the array [";
        print_array($b);
        echo "].";
    } else {
        echo "$a is not in the array [";
        print_array($b);
        echo "].";
    }
}

function pop_array($a = []){
    for($i=0;$i<(sizeof($a)-1);$i++){
        $result[$i] = $a[$i];
    }
    return $result;
}

$push = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
echo "<h4>Array before push</h4>";
print_array($push);


echo "<h4>Array after push</h4>";
$result = push_array(10, $push);
print_array($result);

$flip = array("suv" => "Urus", "sports" => "Huracan", "coupe" => "Aventador");
echo "<h4>Unflipped Associative Array</h4>";
print_r($flip);

$flipped = flip($flip);
echo "<h4>Flipped Associative Array</h4>";
print_r($flipped);

echo "<br/>";

$in_array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$element = 2;

echo "<h4>Exists in Array</h4>";
exists_text($element,$in_array);

echo "<br/>";
$element = 16;
exists_text($element,$in_array);

echo "<br/>";
$popped = [1,2,3,4,5,6,7,8,9,10];
echo "<h4>Array before pop</h4>";
print_array($popped);

$pop = pop_array($popped);
echo "<h4>Array after pop</h4>";
print_array($pop);
?>