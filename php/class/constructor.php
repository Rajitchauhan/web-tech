<?php
    class Person{
      public $branch;

      public function __construct($name){
        echo "person object created";
        $this->name = $name;
      }

      public function __destruct(){
        echo " person object destroy";
      }

      public function info(){
        echo "This is sample of person";
      }


    }

    $obj = new Person('Rahul');
    $obj->info();


// The destructor is automatically called when the script ends or the object is explicitly destroyed
// unset($person); // Uncomment this line to explicitly destroy the object

 ?>
