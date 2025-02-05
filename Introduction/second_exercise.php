<?php

function br()
{
    echo "<br/>";
}
function print_array($a = [])
{
    foreach ($a as $num) {
        echo $num . ",";
    }
    echo "<br/>";
}
function no_vowels($a)
{
    if (is_string($a)) {
        $length = strlen($a);
        $chars = explode("", $a);
        $vowels = 0;

        for ($i = 0; $i < $length; $i++) {
            if ($chars[$i] == "a" || $chars[$i] == "e" || $chars[$i] == "i" || $chars[$i] == "o" || $chars[$i] == "u") {
                $vowels++;
            }
        }
        return $vowels;
    } else {
        return "$a is not a string!";
    }
}
function sort_d($array)
{
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

    return $array; // Return the sorted array
}
function sort_a($array)
{
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

    return $array; // Return the sorted array
}

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
?>