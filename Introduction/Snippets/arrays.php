<?php 
/**
 * array_double() accepts an integer and returns the product
 * of the value and 2
 * @param mixed $a
 * @return float|int
 */
function array_double($a):int{
    $a = $a*2;
    return $a;
}

/**
 * array_max() traverses an array using a foreach loop while 
 * isolating the highest value it encounters in the array
 * and returning it as the max
 * @param mixed $b
 */
function array_max($b){
    $max=0;
    foreach($b as $c){
        if($c >= $max){
            $max = $c;
        }
    }
    return $max;
}

/**
 * reverse() accepts an array which is put through a for loop
 * where the value at each index is placed in separate array 
 * but in reverse order the returns a reveresed array
 * @param mixed $c
 * @return array
 */
function reverse($c){
    $length = sizeof($c);

    for($i=0;$i<=$length;$i++){
        $d[$i]=$c[$length-$i];
    }

    return $d;
}

//Output for array_double()
$first = array(1,2,3,4,5,6,7,8,9,10);
$doubled = array_map('array_double',$first);

echo "<h4>Mapping function</h4>";
echo "The array ";
foreach($first as $a){
    echo $a." ";
}
echo " had it's values doubled to ";

foreach($doubled as $a){
    echo $a." ";
}
echo "<br/><\n>";


//Output for array_max()
echo "<h4>Mapping and Traversal</h4>";
$second = array(234,254,67,234,3534,9787,76,234);

echo "The maximum value in the array ";
foreach($second as $b){
    echo $b." ";
}
echo " is " . array_max($second) .".";
echo "<br/>";

//Output for reverse()
echo "<h4>Reversal without array_reverse() inbuilt function</h4>";
$third = array('a','b','c','d','e','f','g','h','i','j');
$reversed = reverse($third);

echo "The array ";
foreach($third as $c){
    echo $c." ";
}
echo " had it's values reversed to ";

foreach($reversed as $c){
    echo $c." ";
}
echo "<br/>";

?>