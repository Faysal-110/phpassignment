```php
<?php

echo "<h1>PHP & MySQL - Assignment 1</h1>";


  // 1. Greatest and Smallest of Three Numbers
   

echo "<h2>1. Greatest and Smallest</h2>";

$a = 25;
$b = 10;
$c = 40;

$greatest = $a;
$smallest = $a;

if ($b > $greatest) {
    $greatest = $b;
}

if ($c > $greatest) {
    $greatest = $c;
}

if ($b < $smallest) {
    $smallest = $b;
}

if ($c < $smallest) {
    $smallest = $c;
}

echo "Greatest number: $greatest<br>";
echo "Smallest number: $smallest<br>";


  // 2. Divisible by 3, 5, Both, or None

echo "<h2>2. Divisibility</h2>";

$num = 15;

if ($num % 3 == 0 && $num % 5 == 0) {
    echo "$num is divisible by both 3 and 5.<br>";
}
elseif ($num % 3 == 0) {
    echo "$num is divisible by 3.<br>";
}
elseif ($num % 5 == 0) {
    echo "$num is divisible by 5.<br>";
}
else {
    echo "$num is divisible by neither 3 nor 5.<br>";
}



  // 3. Odd Numbers 2-20 and Even Numbers 35-7
  
echo "<h2>3. Odd and Even Numbers</h2>";

echo "Odd numbers from 2 to 20: ";

for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo "$i ";
    }
}

echo "<br>";

echo "Even numbers from 35 to 7: ";

for ($i = 35; $i >= 7; $i--) {
    if ($i % 2 == 0) {
        echo "$i ";
    }
}

echo "<br>";



  // 4. Numbers Divisible by 2 and 5
   

echo "<h2>4. Divisible by 2 and 5</h2>";

echo "Numbers divisible by both 2 and 5 from 50 to 2: ";

for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo "$i ";
    }
}

echo "<br>";



  // 5. Reverse a Number
   

echo "<h2>5. Reverse Number</h2>";

$num = 12345;
$reverse = 0;

while ($num > 0) {

    $digit = $num % 10;

    $reverse = ($reverse * 10) + $digit;

    $num = (int)($num / 10);
}

echo "Reverse number: $reverse<br>";



  // 6. LCM of Two Numbers


echo "<h2>6. LCM</h2>";

$a = 8;
$b = 12;

$lcm = ($a > $b) ? $a : $b;

while (true) {

    if ($lcm % $a == 0 && $lcm % $b == 0) {
        break;
    }

    $lcm++;
}

echo "LCM of $a and $b = $lcm<br>";



// 7. HCF of Two Numbers
   

echo "<h2>7. HCF</h2>";

$a = 18;
$b = 24;

$hcf = 1;

for ($i = 1; $i <= $a && $i <= $b; $i++) {

    if ($a % $i == 0 && $b % $i == 0) {
        $hcf = $i;
    }
}

echo "HCF of $a and $b = $hcf<br>";


  // 8. Multiplication Table 12 x 12
   

echo "<h2>8. Multiplication Table</h2>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";

for ($i = 1; $i <= 12; $i++) {

    echo "<tr>";

    for ($j = 1; $j <= 12; $j++) {

        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}

echo "</table>";



  // 9. Prime or Non-Prime


echo "<h2>9. Prime or Non-Prime</h2>";

$num = 17;
$isPrime = true;

if ($num < 2) {
    $isPrime = false;
}

for ($i = 2; $i < $num; $i++) {

    if ($num % $i == 0) {
        $isPrime = false;
        break;
    }
}

if ($isPrime) {
    echo "$num is a Prime number.<br>";
}
else {
    echo "$num is a Non-Prime number.<br>";
}


 
   //10. Prime Numbers from 10 to 50
   

echo "<h2>10. Prime Numbers from 10 to 50</h2>";

for ($num = 10; $num <= 50; $num++) {

    $isPrime = true;

    for ($i = 2; $i < $num; $i++) {

        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo "$num ";
    }
}

?>
```
