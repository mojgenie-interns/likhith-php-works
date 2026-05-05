# AnimalSounds

## Description

This program demonstrates the use of **abstract classes** in PHP.
It defines a base class `Animal` and forces child classes to implement their own sound behavior.

---

## Concepts Used

* Abstract Classes
* Method Overriding
* Polymorphism
* Classes and Objects

---

## Code Explanation

### 1. Abstract Class

```php
abstract class Animal
{
    abstract public function makeSound(): void; 
}
```

* `Animal` is an abstract class
* It cannot be instantiated directly
* It contains an abstract method `makeSound()`
* Any child class must implement this method

---

### 2. Dog Class

```php
class Dog extends Animal
{
    public function makeSound(): void
    {
        echo "BARK";
    }    
}
```

* Inherits from `Animal`
* Implements `makeSound()`
* Outputs `"BARK"`

---

### 3. Cat Class

```php
class Cat extends Animal
{
    public function makeSound(): void
    {
        echo "MEOW";
    }
}
```

* Also inherits from `Animal`
* Implements `makeSound()` differently
* Outputs `"MEOW"`

---

### 4. Object Creation and Execution

```php
$dog = new Dog();
$cat = new Cat();

$dog->makeSound();
echo PHP_EOL;
$cat->makeSound();
```

* Creates objects of `Dog` and `Cat`
* Calls their respective `makeSound()` methods
* Prints output on separate lines

---

## Output

```
BARK
MEOW
```

---

## Learning Outcome

* Understood how abstract classes enforce structure
* Learned method overriding in child classes
* Practiced basic polymorphism in PHP

---

## Status

Completed ✅
