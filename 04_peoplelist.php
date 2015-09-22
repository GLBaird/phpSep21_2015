<?php

// Make list of people
$people = array(
  array(
    "fullname" => "Leon Baird",
    "type" => "manager",
    "telephone" => array("020 123456", "07860 123456")
  ),
  array(
    "fullname" => "Bob",
    "type" => "standard",
    "telephone" => array("020 45612", "07860 7545444", "07605 1515 1515")
  ),
  array(
    "fullname" => "Evil Stan",
    "type" => "manager",
    "telephone" => array("020 987 654")
  )
);

// print our as html

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>People List</title>
    <style>
      .card {
        border: 1px solid #444;
        background: #EFEFEF;
        padding: 1em;
        margin: 1em auto;
        box-shadow: 1px 1px 5px #999;
        width: 300px;
      }

      .card.manager {
        background: #FFEFEF;
      }
    </style>
  </head>
  <body>
    <h1>People List</h1>
    <p>Here is a list of people:</p>
    <?php

    foreach ($people as $index => $person)  {

      // decide on type of person
      if ($person["type"] == "manager") {
        echo "<div class='card manager'>";
      } else {
        echo "<div class='card'>";
      }
      echo "<p>Record number: $index</p>";
      echo "<h2>{$person["fullname"]}</h2>";

      echo "<p>Telephone numbers:</p>";
      echo "<ul>";

      foreach ($person["telephone"] as $number) {
        echo "<li>$number</li>";
      }

      echo "</ul>";

      echo "</div>";
    }

    foreach ($people as $index => $person) {
      // look for mary
      if ($person["fullname"] != "Mary") {
        continue;
      }

      echo "<p>We have found Mary and she is at record: $index</p>";
      break;
    }

    ?>
  </body>
</html>
