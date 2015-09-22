<?php

function printWelcome() {
    echo "<h1>Welcome to our website</h1>";
    echo "<p>Please enjoy the dynamic content</p>";
}

printWelcome();

function sayHello($name, $greeting="Hello there") {
    echo "<h1>Welcome to $name</h1>";
    echo "<p>$greeting</p>";
}

sayHello("Brian the dog", "Who's a good boy then?");

sayHello("Mike");

function addValues($valA, $valB) {
    $answer = $valA + $valB;
    return $answer;
}

echo "The answer to 4 + 2 is ".addValues(4, 2)."<br>";

$answer = addValues(100, 50) * 10;
echo "Asnwer is $answer<br>";


// puzzle

$users = "Bob, Mary, Peter,Jane,Sue ,Mike ,  Greeta ";

// make array of names
$userList = explode(",", $users);

// tidy up array and remove white space
foreach($userList as $index => $user) {
    $userList[$index] = trim($user);
}

echo "<pre>";
print_r($userList);
echo "</pre>";

?>