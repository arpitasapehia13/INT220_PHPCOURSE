<?php

class Animal {
    public function sound() {
        return "Some animal sound";
    }
}

class Dog extends Animal {

    public function sound() {
        return "Bark";
    }
}


class Cat extends Animal {
    
    public function sound() {
        return "Meow";
    }
}

$animal = new Animal();
echo "Animal sound: " . $animal->sound() . "<br>"; 

$dog = new Dog();
echo "Dog sound: " . $dog->sound() . "<br>";

$cat = new Cat();
echo "Cat sound: " . $cat->sound() . "<br>"; 
?>


//both parent and child class have same function and no.of arguments
//used to replace parent methond in child class
//purpose is to change behaviour of parent class
//2 methods of same name and same parameter is called OVERRIDING