# StudentResultSystem

## Description
This program represents a simple Student Result System using PHP OOP.  
It calculates total marks, average marks, and determines whether a student has passed or failed.

---

## Concepts Used
- Classes and Objects
- Constructors
- Encapsulation (protected properties)
- Methods
- Basic Conditional Logic

---

## Key Components

### 1. Student Class
- Properties:
  - name (public)
  - mark1 (protected)
  - mark2 (protected)
  - mark3 (protected)

---

### 2. Constructor
- Initializes student name and marks  

---

### 3. Method: getTotal()
- Returns total marks  
- Formula:
  - Total = mark1 + mark2 + mark3  

---

### 4. Method: getAverage()
- Returns average marks  
- Formula:
  - Average = Total / 3  

---

### 5. Method: getResult()
- Checks if student passed or failed  
- Condition:
  - Average ≥ 40 → Pass  
  - Otherwise → Fail  

---

## How It Works

1. Create a Student object with:
   - name  
   - three marks  

2. Call methods:
   - getTotal() → total marks  
   - getAverage() → average marks  
   - getResult() → pass/fail status  

---

## How to Run
```bash
php StudentResultSystem.php