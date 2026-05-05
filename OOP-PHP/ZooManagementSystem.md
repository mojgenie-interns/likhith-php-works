# ZooManagementSystem

## Description
This program is a CLI-based Zoo Management System built using PHP.  
It allows the user to add animals, view animal details, and delete animals from the system.

---

## Concepts Used
- Classes and Objects
- Encapsulation
- Arrays
- Loops
- Conditional Statements
- User Input Handling (CLI)

---

## Key Components

### 1. ZooManagementSystem Class
- Manages the full zoo system
- Stores animal records in a private array

---

### 2. Property: animals
- Private array used to store animal details
- Each animal record contains:
  - animal category
  - type
  - name
  - age
  - sex

---

### 3. Method: addAnimals()
- Takes animal details from the user
- Stores the details inside the animals array

---

### 4. Method: viewAnimals()
- Displays all stored animals
- Shows message if no animals are available

---

### 5. Method: deleteAnimals()
- Deletes an animal by name
- Searches through the animals array
- Removes the matching animal record

---

### 6. Method: run()
- Displays the menu
- Handles user choices
- Keeps the program running in a loop

---

## How It Works

1. Program displays menu:
   - View Animals
   - Add Animal
   - Delete Animal
   - Exit

2. User chooses an option

3. Based on choice:
   - Add Animal → stores new animal details
   - View Animals → displays animal list
   - Delete Animal → removes animal by name
   - Exit → exits the program

---

## How to Run
```bash
php ZooManagementSystem.php
