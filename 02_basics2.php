<?php

// Start of PHP application

/*
  mutli line comment
  On as many lines as you like
*/

echo "Hello from <b>PHP</b>";

// variables
$username = "Leon Baird";
$age = 40;

echo "<p>The name is $username and their age is $age.</p>";

// finding the datatype of variables

echo "The datatype of username is: ";
echo gettype($username);
echo "<br>";
echo "The datatype of age is: ";
echo gettype($age);

$iLikePies = true;
echo "<br>";
echo "The datatype of iLikePies is: ".gettype($iLikePies);

/*
  PHP Operators
  =============

  =   Assign

  Maths Operators

  +   Addition
  -   Subtraction
  /   Division
  *   Multiplication
  %   Modulous

  Shorthand Operators

  ++  Add 1
  --  Subtract 1

  +=
  -=
  *=
  /=
  %=

  value--
  value = value - 1

  value += 5
  value = value + 5

  Logical Operators

  !     NOT (invert all logic)
  ==    Equality
  !=    Inequality
  <     Less than
  >     Greater than
  <=    Less than and equals
  >=    Greater than and equals
  ===   Total Equality
  !==   Total Inequality

  logical conjunctives

  &&    AND
  ||    OR



*/

$income = 30000;

$vat = $income * 0.2;

echo "<br>";
echo "For your income of $income you will pay $vat in VAT charges.<br>";

// pay my vat
$income -= $vat;

echo "You are left with $income.<br>";

// logic

echo 20 < 30;
echo 10 == 10;
echo 20 >= 30;
echo 10 != 10;



?>
