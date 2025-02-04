<div class="site-index">

    <?php
        $item = "Chair";
    
        //Constants
    define('commission', 15);
    const WEIGHT = 50;
    
        //Hello World
    echo "Hello World!";
    
        //echo examples (php is exactly the same as print)
    echo 'This ', 'is ', 'a ', 'broken ', $item, "<br/>";
    
        // Double quotes for variable entry
    echo "Maybe a $item<br/>";
    
        // Appending a variable to a string
    echo 'Maybe not a ' . $item . "<br/>";
    
        // Special Characters
    echo "You owe me \$ 100";
    
        echo "<br/><br/>";
    
        // Constant call
    echo "Your commision is " . commission . "%<br/>";
    echo "Your car weighs " . WEIGHT . " tons";
    
        echo "<br/><br/>";
    
        // Switch statement
    switch ($item) {
        case "Chair":
            echo "Switch satatement";
            break;
        case "Table":
            // execute this code when X=value2
            break;
        case "Carpet":
            // execute this code when X=value3
            break;
        default:
            echo "No item";
    }
    
        echo "<br/><br/>";
    
        // While statement
    $num = 0;
    $nm = 0;
    
        while ($num < 4) {
        echo "$num ";
        $num++;
    }
    
        echo "<br/><br/>";
    
        // For Each Loop
    $array = array("Jaguar", "Audi", "Mercedes", "BMW");
    
        foreach ($array as $var) {
        echo "$var <br/>";
    }
    
        echo "<br/><br/>";
    
        // Break statement
    $x = 13;
    
    for($i = 1762; $i < 1800; $i++)
{
    if($i % $x == 0) 
    {
        echo "The number is $i";
        break;
    }
}
    ?>
</div>