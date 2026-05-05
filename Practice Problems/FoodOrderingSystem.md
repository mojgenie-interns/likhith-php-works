# FoodOrderingSystem

## Description
This program demonstrates a simple Food Ordering System using PHP OOP.  
It uses abstract classes and interfaces to model food items, discounts, and delivery features.

---

## Concepts Used
- Abstract Classes
- Interfaces
- Inheritance
- Polymorphism
- Methods
- Functions with Type Hinting

---

## Key Components

### 1. Abstract Class: FoodItem
- Properties:
  - name
  - price  
- Constructor initializes values  
- Abstract method:
  - showDetails() → must be implemented by child classes  
- Method:
  - prepare() → shows preparation message  

---

### 2. Interfaces

#### Discountable
- Method:
  - applyDiscount() → applies discount to price  

#### Deliverable
- Method:
  - Deliver() → handles delivery process  

---

### 3. Pizza Class
- Inherits from FoodItem  
- Implements:
  - Discountable  
  - Deliverable  

- Features:
  - Shows details  
  - Applies discount  
  - Handles delivery  

---

### 4. Burger Class
- Inherits from FoodItem  
- Implements:
  - showDetails() only  

---

### 5. Function: printFood()
- Accepts any FoodItem object  
- Calls showDetails()  
- Demonstrates polymorphism  

---

## How It Works

1. Create objects:
   - Pizza (Cheese Burst, 250)  
   - Burger (Chicken Burger, 150)  

2. Call printFood():
   - Displays food details  

3. For Pizza:
   - prepare() → preparation message  
   - applyDiscount(10) → reduces price  
   - Deliver() → delivery message  

4. For Burger:
   - prepare() → preparation message  

---

## How to Run
```bash
php FoodOrderingSystem.php