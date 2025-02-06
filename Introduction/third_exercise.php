<?php 

function br()
{
    echo "<br/>";
}

function titles($a){
    echo "<h4>$a</h4>";
}
function print_array($a = [])
{
    for($i=0;$i<sizeof($a);$i++) {
        echo $a[$i];
        if($i === (sizeof($a)-1)){
            
        }else{
            echo ",";
        }
    }
}

titles("Test Data");
// Test data for exercises
$testA = [4, 6, 0, 3, 7, 10, 4, 5, 6, 9, 3, 8, 9, 0, 3, 5, 3, 4, 9, 4];
$testB = [3, 14, 15, 13, 5, 3, 14, 8, 12, 11, 13, 14, 15, 2, 3, 15, 8, 1, 12, 0, 6, 9, 11, 0, 14, 5, 2, 2, 15, 13];
$testC = [2,3,4,5,6,7,8];

echo "testA = ["; print_array($testA); echo "]";
br();
echo "testB = ["; print_array($testB); echo "]";
br();
echo "testC = ["; print_array($testC); echo "]";
br();

/**
 * Find the lowest number in array
 *
 * @param array $arrayA
 * @return int
 */
function array_min($arrayA=[]){
    $min=$arrayA[0];

    foreach($arrayA as $b){
        if($min>=$b){
            $min =$b;
        }
    }

    return $min;
}

titles("Minimum");

echo "testA min = "; echo array_min($testA);
br();
echo "testB min = "; echo array_min($testB);
br();
echo "testC min = "; echo array_min($testC);
br();

 /**
 * Find the highest number in array
 *
 * @param array $arrayA
 * @return int
 */
function array_max($arrayA=[]){
    $max=$arrayA[0];

    foreach($arrayA as $b){
        if($max<=$b){
            $max =$b;
        }
    }

    return $max;
}

titles("Maximum");

echo "testA max = "; echo array_max($testA);
br();
echo "testB max = "; echo array_max($testB);
br();
echo "testC max = "; echo array_max($testC);
br();

 /**
 * Find combine two arrays and return the combined result array
 *
 * @param array $arrayA
 * @param array $arrayB
 * @return array
 */
function array_join($arrayA=[],$arrayB=[]){
    $keysA = array_keys($arrayA);
    $valuesA = array_values($arrayA);

    $keysB = array_keys($arrayB);
    $valuesB = array_values($arrayB);
    $num=0;

    for($i=0;$i<sizeof($keysA);$i++){
        $result[$keysA[$i]] =  $valuesA[$i];
        $num++;
    }

    for($i=0;$i<sizeof($arrayB);$i++){
        $result["$num"] =  $valuesB[$i];
        $num++;
    }

    return $result;
}

titles("Combined arrays");

$testAB = array_join($testA,$testB);
echo "testAB = ["; print_array($testAB); echo "]";
br();

$testBC = array_join($testB,$testC); 
echo "testBC = ["; print_array($testBC); echo "]";
br();

$testAC = array_join($testA,$testC);
echo "testAC = ["; print_array($testAC); echo "]";
br();

 /**
 * Find combine two arrays and count elements number in array
 *
 * @param array $arrayA
 * @param array $arrayB
 * @return int
 */
function combined_elements($arrayA=[],$arrayB = []){
    $result = array_join($arrayA,$arrayB);

    return sizeof($result);
}

titles("Combined count");

echo "Count of combined elements for testA and textB: ";echo combined_elements($testA,$testB);
br();

echo "Count of combined elements for testB and textC: ";echo combined_elements($testB,$testC);
br();

echo "Count of combined elements for testA and textC: ";echo combined_elements($testA,$testC);
br();

 /**
 * Find combine two arrays and sum all values
 *
 * @param array $arrayA
 * @param array $arrayB
 * @return int
 */
function combined_sum($arrayA=[],$arrayB = []){
    $result = array_join($arrayA,$arrayB);
    $sum=0;

    for($i=0;$i<sizeof($result);$i++){
        $sum += $result[$i];
    }

    return $sum;
}

titles("Combined sum");

echo "Sum of combined elements for testA and textB: ";echo combined_sum($testA,$testB);
br();

echo "Sum of combined elements for testB and textC: ";echo combined_sum($testB,$testC);
br();

echo "Sum of combined elements for testA and textC: ";echo combined_sum($testA,$testC);
br();

 /**
 * Find all even numbers
 *
 * @param array $arrayA
 * @return int
 */
function even_count($arrayA){
    $nums = 0;
    $count = 0;

    foreach($arrayA as $a){
        if($a%2 == 0){
            $nums++;
            $arrayB[$count] = $a;
            $count++;
        }
    }

    return $nums;
}

 /**
 * Find all even elements
 *
 * @param array $arrayA
 * @return array
 */
function even_elements($arrayA){
    $count = 0;

    foreach($arrayA as $a){
        if($a%2 == 0){
            $arrayB[$count] = $a;
            $count++;
        }
    }

    return $arrayB;
}

titles("Even numbers");

$evenA = even_elements($testA);
echo "The ".even_count($testA)." even numbers in testA are ["; print_array($evenA); echo "]";
br();

$evenB = even_elements($testB);
echo "The ".even_count($testB)." even numbers in testB are ["; print_array($evenB); echo "]";
br();

$evenC = even_elements($testC);
echo "The ".even_count($testC)." even numbers in testC are ["; print_array($evenC); echo "]";
br();


 /**
 * This function has a small error. Find it and fix it.
 * Runtime Message: "PHP Notice:  Undefined offset: 30 in ...."
 *
 * Hint: use the debugger
 */
function findTheErrorRemoveTheNotice(array $input)
{
    $max = count($input);
    // while loop
    $i = 0;
    while ($i < $max) {
        echo $input[$i];
        $i++; // increment i, otherwise it will loop forever
    }
    echo PHP_EOL;

    $i = 0;

    // do while
    do {
        echo $input[$i];
        $i++; // increment i, otherwise it will loop forever
    } while ($i < $max);
    echo PHP_EOL;
}

titles("Fixed function output");

findTheErrorRemoveTheNotice($testB);
br();


 /**
 * Find combine two arrays and order values ascending
 *
 * @param array $arrayA
 * @param array $arrayB
 * @return array
 */

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
    return $array;
}

function combined_asc($arrayA=[],$arrayB = []){
    $result = array_join($arrayA,$arrayB);

    return sort_any('asc',$result);
}

titles("Ascending combination");

echo "testAB ascending order: ";
$asc = combined_asc($testA,$testB);
echo "["; print_array($asc); echo "]";
br();

echo "testBC ascending order: ";
$asc = combined_asc($testB,$testC);
echo "["; print_array($asc); echo "]";
br();

echo "testAC ascending order: ";
$asc = combined_asc($testA,$testC);
echo "["; print_array($asc); echo "]";
br();

 /**
 * Find combine two arrays and order values descending
 *
 * @param array $arrayA
 * @param array $arrayB
 * @return array
 */
function combined_desc($arrayA=[],$arrayB = []){
    $result = array_join($arrayA,$arrayB);

    return sort_any('desc',$result);
}

titles("Descending combination");

echo "testAB descending order: ";
$desc = combined_desc($testA,$testB);
echo "["; print_array($desc); echo "]";
br();

echo "testBC descending order: ";
$desc = combined_desc($testB,$testC);
echo "["; print_array($desc); echo "]";
br();

echo "testAC descending order: ";
$desc = combined_desc($testA,$testC);
echo "["; print_array($desc); echo "]";
br();

 /**
 * Add a new number at beginning of the array
 *
 * @param array $arrayA
 * @param int $newNumber
 * @return array
 */
function new_start($newNumber,$arrayA){
    $result[0] = $newNumber;
    for($i=0;$i<sizeof($arrayA);$i++){
        $result[$i+1] = $arrayA[$i]; 
    }

    return $result;
}

$newA = 16;
$newB = 8;
$newC = 10;

titles("Reverse array_push()");

echo "Adding $newA to the start of [";
print_array($testA);
echo "] results in [";
$new_array = new_start($newA,$testA);
print_array($new_array);
echo "]";
br();

echo "Adding $newB to the start of [";
print_array($testB);
echo "] results in [";
$new_array = new_start($newB,$testB);
print_array($new_array);
echo "]";
br();

echo "Adding $newC to the start of [";
print_array($testC);
echo "] results in [";
$new_array = new_start($newC,$testC);
print_array($new_array);
echo "]";
br();

 /**
 * Add a new number at the end of the array
 *
 * @param array $arrayA
 * @param int $newNumber
 * @return array
 */
function push_array($newNumber, $a = [])
{
    $a[sizeof($a)] = $newNumber;

    return $a;
}

titles("Alternative array_push()");

echo "Adding $newA to the end of [";
print_array($testA);
echo "] results in [";
$new_array = push_array($newA,$testA);
print_array($new_array);
echo "]";
br();

echo "Adding $newB to the end of [";
print_array($testB);
echo "] results in [";
$new_array = push_array($newB,$testB);
print_array($new_array);
echo "]";
br();

echo "Adding $newC to the end of [";
print_array($testC);
echo "] results in [";
$new_array = push_array($newC,$testC);
print_array($new_array);
echo "]";
br();


 /**
 * Add a new number at the given position and reorder the other numbers
 *
 * @param array $arrayA
 * @param int $newNumber
 * @param int $position
 * @return array
 */
function add_num($arrayA,$newNumber,$position){
    for($i=0;$i<=sizeof($arrayA);$i++){
        if($i==$position){
            $result[$i] = $newNumber;
        }else{
            if($i<$position){
                $result[$i] = $arrayA[$i];
            }else{
                $result[$i] = $arrayA[$i-1];
            }
        }
    }

    return $result;
}

titles("Alternative array_push()");
$positionA = 4;
$positionB = 12;
$positionC = 3;

echo "Adding $newA to [";
print_array($testA);
echo "] at index $positionA results in [";
$new_array = add_num($testA,$newA,$positionA);
print_array($new_array);
echo "]";
br();

echo "Adding $newB to [";
print_array($testB);
echo "] at index $positionB results in [";
$new_array = add_num($testB,$newB,$positionB);
print_array($new_array);
echo "]";
br();

echo "Adding $newC to [";
print_array($testC);
echo "] at index $positionC results in [";
$new_array = add_num($testC,$newC,$positionC);
print_array($new_array);
echo "]";
br();


/**
 * Replace a element/value at a given position
 *
 * @param array $arrayA
 * @param int $newNumber
 * @param int $position
 * @return array
 */
function replace_num($arrayA,$newNumber,$position){
    for($i=0;$i<sizeof($arrayA);$i++){
        if($i==$position){
            $result[$i] = $newNumber;
        }else{
            $result[$i] = $arrayA[$i];
        }
    }

    return $result;
}

titles("Replacing elements at positions");

echo "Replacing the element at index $positionA in [";
print_array($testA);
echo "] with $newA results in [";
$new_array = replace_num($testA,$newA,$positionA);
print_array($new_array);
echo "]";
br();

echo "Replacing the element at index $positionB in [";
print_array($testB);
echo "] with $newB results in [";
$new_array = replace_num($testB,$newB,$positionB);
print_array($new_array);
echo "]";
br();

echo "Replacing the element at index $positionC in [";
print_array($testC);
echo "] with $newC results in [";
$new_array = replace_num($testC,$newC,$positionC);
print_array($new_array);
echo "]";
br();

 /**
 * Replace all occurrences of a value with a new value
 *
 * @param array $arrayA
 * @param int $searchValue
 * @param int $replaceValue
 * @return array
 */
function replace_all($arrayA,$searchValue,$replaceValue){
    for($i=0;$i<sizeof($arrayA);$i++){
        if($arrayA[$i]==$searchValue){
            $result[$i] = $replaceValue;
        }else{
            $result[$i] = $arrayA[$i];
        }
    }

    return $result;
}

titles("Replacing all similar elements");

$searchA = 0;
$searchB = 3;
$searchC = 8;

$replaceA = 1;
$replaceB = 16;
$replaceC = 9;

echo "Replacing the elements with a value of $searchA in [";
print_array($testA);
echo "] with $replaceA results in: <br/>";
$new_array = replace_all($testA,$searchA,$replaceA);
print_r($new_array);
br();br();

echo "Replacing the elements with a value of $searchB in [";
print_array($testB);
echo "] with $replaceB results in: <br/>";
$new_array = replace_all($testB,$searchB,$replaceB);
print_r($new_array);
br();br();

echo "Replacing the elements with a value of $searchC in [";
print_array($testC);
echo "] with $replaceC results in: <br/>";
$new_array = replace_all($testC,$searchC,$replaceC);
print_r($new_array);
br();
?>