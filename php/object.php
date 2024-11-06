<?php
class Car {
    private $make;
    private $model;
    private $year;
    private $color;

  
    public function __construct($make, $model, $year, $color) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
    }

    // Getters
    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getYear() {
        return $this->year;
    }

    public function getColor() {
        return $this->color;
    }

    // Setters
    public function setMake($make) {
        $this->make = $make;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    // Method to start the engine
    public function startEngine() {
        return "Engine Started";
    }
}


$myCar = new Car("Toyota", "Camry", 2020, "black");

// Getting the model using the getter method
echo "Model: " . $myCar->getModel() . "\n";


?>

