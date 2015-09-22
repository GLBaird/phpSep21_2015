<?php

class Employee {
    
    var $surname;
    var $forname;
    var $telephone = [];
    
    function __construct($surname="Person", $forename="New") {
        $this->surname = $surname;
        $this->forname = $forename;
    }
    
    function getFullName() {
        return $this->forname." ".$this->surname;
    }
    
    function addPhoneNumber($number) {
        $this->telephone[] = $number;
    }
    
    function getTelephoneHTML() {
        $html = "<ul>";
        foreach ($this->telephone as $number) {
            $html .= "<li>$number</li>";
        }
        $html .= "</ul>";
        return $html;
    }
    
}

class Contactor extends Employee {
    
    var $company;
    
    function getCompanyDetails() {
        return "This person is supplied by ".$this->company."<br>";
    }
    
}





// make some people

$person1 = new Employee();
echo $person1->getFullName();

$person1->forname = "Leon";
$person1->surname = "Baird";

echo $person1->getFullName();

$person2 = new Employee("Jones", "Indiana");
echo $person2->getFullName();

$person1->addPhoneNumber("020 123 456");
$person1->addPhoneNumber("07860 123 456");

echo $person1->getTelephoneHTML();

$bob = new Contactor("Bob", "Bob");
$bob->company = "Evil Workers INC";
echo $bob->getCompanyDetails();

?>