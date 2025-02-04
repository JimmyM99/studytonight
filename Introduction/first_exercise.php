<?php

/**
 * calculator() accepts two digits and an operator
 * performs the oprations (+,-,/,*)
 * returns the equation and it's answer
 * @param mixed $a
 * @param mixed $b
 * @param mixed $c
 * @return string
 */
function calculator($a, $b, $c)
{
    $ans = 0;
    $br = "<br/>";
    switch ($c) {
        case "*":
            $ans = $a *= $b;
            return "$a $c $b = $ans $br";
        case "-":
            $ans = $a -= $b;
            return "$a $c $b = $ans $br";
        case "/":
            if ($b === 0) {
                return "$a $c $b = Cannot divide by zero!";
            }
            $ans = $a /= $b;
            return "$a $c $b = $ans $br";
        case "+":
            $ans = $a += $b;
            return "$a $c $b = $ans $br";
        default:
            return "$a $c $b = Invalid Operator $br";
    }
}

/**
 * reverseString() accepts a string as it's parameter
 * the string is converted into an array using str_split() 
 * the array is reversed using array_reverse()
 * the values of the reversed array are cancateneated into a string for output
 * @param mixed $a
 * @return string
 */
function reverseString($a)
{
    $length = strlen($a);
    $letters = str_split($a);
    $array = array_reverse($letters);
    $ans = "";
    $br = "<br/>";

    for ($i = 0; $i < $length; $i++) {
        $ans .= $array[$i];
    }

    return $ans . $br;
}

/**
 * reverse() accepts a string and utilizing inbuilt string functions
 * strlen() for size and str_split() to separate the characters
 * the array of chars is run through a for loop that places its values
 * in another array but in reverse order thus outputting a reversed
 * string after implode() [ing] the array
 * @param mixed $a
 * @return string
 */
function reverse($a)
{
    $length = strlen($a);

    $first = str_split($a);

    $second = [];
    $br = "<br/>";
    $ans = "";

    for ($i = 1; $i <= $length; $i++) {
        $second[$i] = $first[$length - $i];
    }

    $ans = implode("", $second);
    return $ans . $br;
}

/**
 * factorial() accepts a string and after running it though a for loop
 * that computes  the product between all numbers between the given 
 * number and 0 (including the number) and returns that as the output  
 * @param mixed $a
 * @return string
 */
function factorial($a)
{
    $ans = 1;
    $br = "<br/>";

    for ($i = 0; $i < $a; $i++) {
        $ans *= ($a - $i);
    }

    return $ans . $br;
}

/**
 * parity() accepts a value that is then divided by 2 to observe the remainder
 * if the remander is 0, it returns the number and it's parity (odd or even)
 * @param mixed $a
 * @return void
 */
function parity($a)
{
    if (($a % 2) == 0) {
        echo "$a is an even number<br/>";
    } else {
        echo "$a is an odd number<br/>";
    }
}

echo "<h3>Calculation function</h3>";
echo calculator(10, 5, '+'); // Output: 10 + 5 = 15
echo calculator(10, 5, '/'); // Output: 10 / 5 = 2
echo calculator(10, 5, '%'); // Output: "Invalid operator"
echo calculator(10, 0, '/');

echo "<h3>String Reversal function</h3>";
echo "<h4>Array functions</h4>";
echo reverseString("hello"); // Output: "olleh"
echo reverseString("world"); // Output: "dlrow"

echo "<h4>Separate array to hold values</h4>";
echo reverse("Goodbye"); // Output: "eybdooG"
echo reverse("Universe"); // Output: "esrevinU"

echo "<h3>Factorial function</h3>";
echo factorial(5); // Output: 120
echo factorial(7); // Output: 5040

echo "<h3>Odd or Even function</h3>";
echo parity(122); // Output: "122 is an even number"
echo parity(263); // Output: "263 is an odd number"
?>