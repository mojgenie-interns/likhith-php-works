# EmployeeManagement

## Description
This program demonstrates a simple Employee Management System using PHP OOP concepts.  
It includes different employee roles and calculates bonuses based on their position.

---

## Concepts Used
- Classes and Objects  
- Abstract Classes  
- Inheritance  
- Traits  
- Static Properties and Methods  
- Encapsulation  
- Polymorphism  

---

## Key Components

### 1. Trait: CompanyInfo
- Provides reusable method `companyName()`  
- Returns company name: Mojgenie IT Solutions  

---

### 2. Abstract Class: Employee
- Base class for all employees  
- Contains:
  - name  
  - salary  
- Uses CompanyInfo trait  
- Static property `$count` tracks total employees  
- Abstract method `calculateBonus()`  
- Method `showDetails()` prints employee info  

---

### 3. Manager Class
- Inherits from Employee  
- Bonus = 20% of salary  

---

### 4. Developer Class
- Inherits from Employee  
- Bonus = 10% of salary  

---

### 5. Static Feature
- `$count` tracks number of employees created  
- Accessed using:
```php
Employee::showCount();