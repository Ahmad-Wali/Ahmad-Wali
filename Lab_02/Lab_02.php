<?php
class StudentAccount{
    public $name;
    private $studentid;
    protected $department;
    function __construct($name, $studentid, $department){
        $this->name=$name;
        $this->studentid=$studentid;
        $this->department=$department;
    }
    function showinfo(){
        echo"Name ".$this->name."<br>";
        echo"Student ID ".$this->studentid."<br>";
        echo"Department :".$this->department."<br>";
    }
    function getStudentid(){
    return $this->studentid;
    
    }

    }
$student1=new StudentAccount("Ahmad", 1001,"Computer Science");
$student1->showinfo();
echo "Student ID from method: ".$student1->getStudentid()."<br>";

//echo $student1->name;
//echo $student1->studentid;
//echo $student1->department;

//Experiment:
//Property     Works outside class?     Reason
//$name       _______yes___________  _It is a public variable and is accessable inside and out side the class_
//$studentId  ________no___________  _this is a private variable and can't be used outside the class_
//$department ________no___________  _this is a protevted variable and only works wthin children of the class_


//Task 2

class Person{
    protected $name;

    function __construct($name){
        $this->name=$name;
    }
    function introduce(){
        echo"My name is ".$this->name."<br>";
        // Display: My name is Sara
    }
}

class Student extends Person{
    function study(){
        echo $this->name." is studying"."<br>";
        // Display: Sara is studying.
    }
}
$student2 = new Student("Sara");
$student2->introduce();
// Call introduce()
$student2->study();
// Call study()




//Task 3
class Employee{
    public $company;
    protected $name;
    private $salary;
    function __construct( $name, $company, $salary){
        $this->name=$name;
         $this->company=$company;
        $this->salary=$salary;
    }
    // Write the constructor
    
    function showEmployee(){
        echo "Name: ".$this->name."<br>";
        echo "Company: ".$this->company."<br>";
        echo "Salary: ".$this->salary."<br>";
    }
    // Write showEmployee()

    function getSalary(){
        echo "Salary from method: ".$this->salary."<br>";
    }
    // Write getSalary()
}
class Manager extends Employee{
    function manageTeam(){
        echo $this->name." is managing the team."."<br>";
    }
    // Write manageTeam()
}

$manager1 = new Manager("Ali", "Kabul Tech", 30000);
$manager1->showEmployee();
$manager1->getSalary();
$manager1->manageTeam();
// Call the required methods



?>
