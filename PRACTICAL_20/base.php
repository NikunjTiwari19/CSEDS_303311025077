<?php
$n = 5;

if ($n % 2 == 0)
    echo "Even<br>";
else
    echo "Odd<br>";

for ($i = 1; $i <= 5; $i++)
    echo $i . " ";

echo "<br>";

$numbers = array(10, 20, 30);

foreach ($numbers as $x)
    echo $x . " ";

function square($n)
{
    return $n * $n;
}

echo "<br>Square: " . square(5);
?>