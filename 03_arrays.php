<?php

$names = array("Bob", "Mary", "Betty", "Harold", "Sam");

$names[] = "Evil Jack";

echo "What will happen? {$names[7]}<br>"; // GENERATES ERROR REPORT

echo "The first name is ".$names[0].".<br>";

echo "The third person is called {$names[2]}.<br>";

echo "The second person is called $names[1].<br>"; // NEW!!!

echo "I have ".count($names)." names in the array.<br>";

// loop through names

foreach ($names as $index => $name) {
  echo "<p>#$index = $name</p>";
}

foreach ($names as $name) {
  echo "Hi there $name<br>";
}

// Associative array

$userInfo = array(
  "surname" => "Baird",
  "forename" => "Leon",
  "age" => 40
);

$names[0];

echo $userInfo["age"];
echo $userInfo["forename"];
echo "<br>";

echo "surname = {$userInfo["surname"]}<br>";

// multidimensial array
$people = array(
  array(
    "surname" => "Jones",
    "forename" => "Indiana"
  ),
  array(
    "surname" => "Solo",
    "forename" => "Hans"
  ),
  array(
    "surname" => "Potter",
    "forename" => "Harry"
  )
);

$numberOfPeople = count($people);

echo "I have $numberOfPeople people in my colletion<br>";

$firstPersonSurname = $people[0]["surname"];

echo "First person is called $firstPersonSurname<br>";

foreach ($people as $person) {
  echo "<h1>Person found</h1>";
  echo "<p>Hi there to {$person["forename"]} {$person["surname"]}!!!</p>";
  echo "<hr>";
}

// Print out array!!

echo "<pre>";

print_r($names);

echo "<b>Now for the big array!!</b><br>";

print_r($people);

echo "</pre>";

?>
