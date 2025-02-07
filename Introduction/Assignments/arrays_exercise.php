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

function implod($a,$b){
    $string="";
    for($i=0;$i<sizeof($b);$i++){
        if($i==(sizeof($b)-1)){
            $string = $string.$b[$i];
        }else{
            $string = $string.$b[$i].$a;
        }   
    }
    return "$string";
}

function explod($a,$b,$c=null){
    $space = 0;
    $cond = 0;
    for($i=0;$i<strlen($b);$i++){
        if($b[$i] != $a){
            if($cond==1){
                break;
            }
            $space++;
        }else{
            $cond++;
        }
    }

    $offset=0;
    if($c === null){
        $c = $space+1;
    }
    
    for($i=0;$i<$c;$i++){
        $result[$i] = substr($b, $offset, $space);
        if($i==0){
            $offset = $space+1;
        }else{
            $offset = $offset+$space+1;
        }
    }
    return $result;
}

echo '<div class="container">';
echo '<div class="column"">';
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

echo '</div>';
echo '<div class="column">';

echo "<h4>Array after sort (ascending order)</h4>";
$sort_a = sort_a($sort_a);
$sort_b = sort_a($sort_b);
$sort_c = sort_a($sort_c);
print_array($sort_a);
print_array($sort_b);
print_array($sort_c);

//single function that accepts two arguments and can change sort order
$sort_d = array(8,14,24,46,64,12,42,10,88,34);

echo "<h4>Sort function that accepts two arguments and can sort in either asc or desc order</h4>";
echo "Before sort: ";print_array($sort_d);

$sort_d = sort_any('desc',$sort_d);
echo "Descending: ";print_array($sort_d)."<br/";

$sort_d = sort_any('asc',$sort_d);
echo "Ascending: ";print_array($sort_d)."<br/";

echo "<br/>";

echo "<h4>Array before implode</h4>";
print_array($sort_d);
echo "<h4>String after implode</h4>";
$ce = implod("-",$sort_d);
echo $ce;

echo "<br/>";

echo "<h4>String before explode</h4>";
echo "076-035-192-323";
echo "<h4>String after explode</h4>";
$de = explod("-","076-035-192-323");
print_r($de);

echo "<br/>";

echo "<h4>String after explode with limiter</h4>";
$de = explod("-","076-035-192-323",2);
print_r($de);

echo '</div>';
echo '</div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <link rel="stylesheet" href="arrays.css">
</head>
<body>
</body>
</html>