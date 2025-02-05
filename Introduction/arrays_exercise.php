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
    echo "<br/>";
}

function push_array($val, $a = [])
{
    $a[sizeof($a)] = $val;
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

function exists_text($a, $b = [])
{
    if (exists_in_array($a, $b)) {
        echo "$a is in the array ";
        print_array($b);
    } else {
        echo "$a is not in the array ";
        print_array($b);
    }
}

$m = [2, 4, 7, 8]; //3 4  n < 3 // 
function pop_array($a = [])
{
    for ($i = 0; $i < (sizeof($a)); $i++) {
        $result[$i] = $a[$i];
    }
    return $result;
}
function sort_any($a, $array = [])
{
    if ($a === 'asc') {
        $length = count($array);

        for ($i = 0; $i < $length - 1; $i++) {
            for ($j = 0; $j < $length - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) { // Swap if current is smaller than next
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return $array;
    } elseif ($a === 'desc') {
        $length = count($array);

        for ($i = 0; $i < $length - 1; $i++) {
            for ($j = 0; $j < $length - $i - 1; $j++) {
                if ($array[$j] < $array[$j + 1]) { // Swap if current is smaller than next
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return $array;
    }
}
function sort_d($array)
{
    $length = count($array);

    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($array[$j] < $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }

    return $array;
}

function sort_a($array)
{
    $length = count($array);

    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }

    return $array;
}

//Push Function Output
$push = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
echo "<h4>Array before push</h4>";
print_array($push);

echo "<h4>Array after push</h4>";
$result = push_array(10, $push);
print_array($result);

//Flip Function Output
$flip = array("suv" => "Urus", "sports" => "Huracan", "coupe" => "Aventador");
echo "<h4>Unflipped Associative Array</h4>";
print_r($flip);

$flipped = flip($flip);
echo "<h4>Flipped Associative Array</h4>";
print_r($flipped);

echo "<br/>";

//In is array Function Output
$in_array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$element = 2;

echo "<h4>Exists in Array</h4>";
exists_text($element, $in_array);

echo "<br/>";
$element = 16;
exists_text($element, $in_array);

//Pop Function Output
echo "<br/>";
$popped = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo "<h4>Array before pop</h4>";
print_r($popped);

$pop = pop_array($popped);
echo "<h4>Array after pop</h4>";
print_array($pop);

//Sort Function Output
echo "<h4>Array before sort</h4>";
$sort_a = array(9, 4, 7, 2, 6, 1, 5, 8, 3);
$sort_b = array('j', 'b', 'd', 'i', 'f', 'a', 'h', 'e', 'g', 'c');
$sort_c = array('G', 'B', 'I', 'F', 'H', 'E', 'A', 'D', 'J', 'C');

print_array($sort_a);
print_array($sort_b);
print_array($sort_c);

echo "<h4>Array after sort (descending order)</h4>";
$sort_a = sort_d($sort_a);
$sort_b = sort_d($sort_b);
$sort_c = sort_d($sort_c);
print_array($sort_a);
print_array($sort_b);
print_array($sort_c);

echo "<h4>Array after sort (ascending order)</h4>";
$sort_a = sort_a($sort_a);
$sort_b = sort_a($sort_b);
$sort_c = sort_a($sort_c);
print_array($sort_a);
print_array($sort_b);
print_array($sort_c);

//single function that accepts two arguments and can change sort order
$sort_d = array(8,12,24,46,64,12,42,10,88,12);

$sort_d = sort_any('desc',$sort_d);
print_array($sort_d);

$sort_d = sort_any('asc',$sort_d);
print_array($sort_d);
?>