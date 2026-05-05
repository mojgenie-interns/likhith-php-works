# CartSystem

## Description
This program demonstrates a simple shopping cart system using PHP OOP.  
It allows adding products to a cart and calculates the total price.

---

## Concepts Used
- Classes and Objects
- Constructors
- Arrays
- Methods
- Object Interaction

---

## Key Components

### 1. Product Class
- Properties:
  - name
  - price  
- Constructor:
  - Initializes product details  

---

### 2. Cart Class
- Property:
  - products → array to store Product objects  

- Methods:
  - addProduct() → adds product to cart  
  - getTotalPrice() → calculates total price  

---

## How It Works

1. Create product objects:
   - Laptop (50000)  
   - Mouse (1000)  
   - Keyboard (2000)  

2. Create a Cart object  

3. Add products to cart  

4. Calculate total price:
   - Total = sum of all product prices  

5. Display total price  

---

## How to Run
```bash
php CartSystem.php