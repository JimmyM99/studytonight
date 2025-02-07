<?php

// name attribute of the input field goes inside the 
// square brackets of $_POST superglobal
$name = $_POST["name"];
$age = $_POST["age"];
$email = $_POST["email"];

echo "Name: $name<br/>Email: $email<br/>Age: $age ";

?>