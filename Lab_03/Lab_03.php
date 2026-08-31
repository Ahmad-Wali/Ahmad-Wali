<?php
//Ahamd Wali Safi
class Library{
    const MAX_BOOKS = 3;
}
echo "Maximum books allowed: ".Library::MAX_BOOKS."<br>";
//the vlaue is constant because we define
//it inside the class so when there is a fixed
//value and it will not be changed while running
//the program it is called a constant value


class StudentCounter{
    static $count=0;//intial value of the count var is zero
    public static function addStudent(){
        self::$count++; // static function make us able to call the function without creating its object
    }
    
}
StudentCounter::addStudent();
StudentCounter::addStudent();
StudentCounter::addStudent();
echo"Total students: ".StudentCounter::$count."<br>";
// we call the functions that are abstract without creating their object
// prints the qouted part as well as student counter


abstract class Vehicle{
    abstract public function start();
    //abstract class is created inside the parent class and it will be defined inside the child class
    
}
class car extends Vehicle{
    public function start(){
        echo "Car engine started"."<br>";
    }
    // the abstract class is implemented in child class of vehicles
}
class Bike extends Vehicle{
    public function start(){
        echo "Bike started"."<br>";
    }
    // the abstract class is implemented in child class of vehicles
}
$car1=new car();
$bike1=new Bike();
$car1->start();
$bike1->start();
// this is the process of creating objects and calling functions using them
?>
