# ShapeAreaCalculator

## Description
This program calculates the area of different shapes using PHP OOP.  
It uses an abstract class to define a common structure and implements specific area calculations in child classes.

---

## Concepts Used
- Abstract Classes
- Inheritance
- Method Overriding
- Encapsulation
- Polymorphism

---

## Key Components

### 1. Abstract Class: Shape
- Defines method `calculateArea()`
- Forces all child classes to implement area calculation

---

### 2. Circle Class
- Inherits from Shape
- Property:
  - radius
- Formula:
  - Area = π × r²

---

### 3. Rectangle Class
- Inherits from Shape
- Properties:
  - length
  - breadth
- Formula:
  - Area = length × breadth

---

## How It Works

1. Create a Circle object with radius 5  
2. Create a Rectangle object with length 6 and breadth 7  

3. Call `calculateArea()` for both objects  

4. Display the results  

---

## How to Run
```bash
php ShapeAreaCalculator.php