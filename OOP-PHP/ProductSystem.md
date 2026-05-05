# ProductWithTrait

## Description
This program demonstrates the use of traits in PHP to apply discounts on products.  
It shows how reusable functionality can be shared across classes using traits.

---

## Concepts Used
- Classes and Objects  
- Traits  
- Static Properties  
- Encapsulation  

---

## Key Components

### 1. Trait: Discount
- Contains method `applyDiscount()`  
- Applies a 10% discount on given price  

---

### 2. Product Class
- Uses the Discount trait  
- Static property `$count` tracks number of products  
- Stores product name  

---

### 3. Constructor
- Initializes product name  
- Increments total product count  

---

### 4. Method: showPrice()
- Takes original price  
- Applies discount using trait  
- Displays final price  

---

## How It Works

1. Two products are created:
   - Phone  
   - Laptop  

2. Each product:
   - Uses trait method to calculate discounted price  
   - Displays final price  

3. Total number of products is displayed  

---

## How to Run
```bash
php ProductWithTrait.php