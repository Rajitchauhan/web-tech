<?php

class Car{
  public $carName; // gives error $carName;
  public $carColor;

  public function startCar(){  // function startCar() gives error
    echo "Car is start";
  }
  public function stopCar(){
    echo "Car is stop";
  }
}

$obj = new Car();
$obj->carName = 'BMW';
$obj->carColor = 'Black';
// Corrected variables usage
echo "<br>" . $obj->carColor . "<br>";
echo "<br>" . $obj->carName . "<br>";

$obj->startCar();
$obj->stopCar();
 ?>
