# ProductSystem

## Description
This program demonstrates a simple product system using PHP OOP.  
It calculates the final price of products after applying a discount.

---

## Concepts Used
- Classes and Objects  
- Constructors  
- Static Properties  
- Basic Methods  

---

## Key Components

### 1. Product Class
- Properties:
  - name  
  - price  
- Static Property:
  - `$count` → tracks total number of products created  

---

### 2. Constructor
- Initializes product name and price  
- Increments product count  

---

### 3. Method: getFinalPrice()
- Applies a 10% discount  
- Formula:
  - Final Price = price × 0.9  

---

## How It Works

1. Two products are created:
   - Shampoo  
   - Facewash  

2. Each product:
   - Stores its name and price  
   - Calculates discounted price  

3. Final prices are printed  

---

## How to Run
```bash
php ProductSystem.php