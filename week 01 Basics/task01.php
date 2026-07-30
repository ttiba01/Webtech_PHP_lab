<?php
$studentName = "Tasnim Tiba";
$studentID   = "23-54755-3";
$foodItem      = 3;
$quantity    = 6;

if ($foodItem == 1) {
    $Item = "Burger";
    $price = 5;
} elseif ($foodItem == 2) {
    $Item = "Pizza";
    $price = 8;
} elseif ($foodItem == 3) {
    $Item = "Sandwich";
    $price = 4;
} elseif ($foodItem == 4) {
    $Item = "Coffee";
    $price = 3;
} else {
    $Item = "Unknown";
    $price = 0;
}

$total = $price * $quantity;

if ($total >= 30) {
    $discountPercent = 20;
} elseif ($total >= 20) {
    $discountPercent = 10;
} else {
    $discountPercent = 0;
}

$discountAmount = ($total * $discountPercent) / 100;
$finalBill = $total - $discountAmount;

echo "================================<br>";
echo " UNIVERSITY CAFETERIA<br>";
echo "================================<br>";
echo "<br>";
echo "Student Name : {$studentName}<br>";
echo "Student ID : {$studentID}<br>";
echo "<br>";
echo "Food Item : {$Item}<br>";
echo "Price : \$$price<br>";
echo "Quantity : {$quantity}<br>";
echo "<br>";
echo "Ordered Items:<br>";

for ($i = 1; $i <= $quantity; $i++) {
    echo "Item {$i}: {$foodItem}<br>";
}

echo "<br>";
echo "Subtotal : \$$total<br>";
echo "Discount : $discountPercent%<br>";
echo "Discount Amt : \$$discountAmount<br>";
echo "Final Bill : \$$finalBill<br>";
echo "<br>";
echo "Thank you for visiting!<br>";
echo "================================<br>";
?>