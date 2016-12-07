<?php namespace App\People;

abstract class Person {
    private $weigth;
    private $height;
    private $age;
    
    public function __construct($height = 0, $weight = 0, $age = 0) {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }
    
    public function getweight() {
        return $this->weight;   
    }
    public function getHeight() {
        return $this->height;
    }
    public function getAge() {
        return $this->age;   
    }
}