# ProductDiscountSystem

## Description
This program demonstrates a product system using PHP OOP with traits.  
It applies a discount to product prices and keeps track of total products created.

---

## Concepts Used
- Classes and Objects
- Traits
- Static Properties
- Methods
- Encapsulation

---

## Key Components

### 1. Trait: Discount
- Provides method `applyDiscount()`
- Applies 10% discount on price

---

### 2. Product Class
- Uses Discount trait
- Properties:
  - name
  - price
- Static Property:
  - `$count` → tracks number of products

---

### 3. Constructor
- Initializes product name and price
- Increments total product count

---

### 4. Method: showFinalPrice()
- Uses trait method to calculate discounted price
- Returns final price after discount

---

## How It Works

1. Two products are created:
   - Shampoo (500)
   - Facewash (250)

2. Discount is applied:
   - 10% reduction using trait

3. Final prices are calculated and displayed

4. Total number of products is printed

---

## How to Run
```bash
php ProductDiscountSystem.php