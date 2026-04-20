<?php
abstract class Animal
{
    abstract public function makeSound(): void; 
}
class Dog extends Animal
{
    public function makeSound(): void
    {
        echo "BARK";
    }    
}
class Cat extends Animal
{
    public function makeSound(): void
    {
        echo "MEOW";
    }
}
$dog = new Dog();
$cat = new Cat();
$dog->makeSound();
echo PHP_EOL;
$cat->makeSound();