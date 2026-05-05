# EmployeeSalarySystem

## Description
This program demonstrates a simple Employee Salary System using PHP OOP.  
It calculates the final salary based on employee type (Full-time or Part-time).

---

## Concepts Used
- Classes and Objects
- Inheritance
- Method Overriding
- Encapsulation
- Polymorphism
- User Input Handling (CLI)

---

## Key Components

### 1. Employee Class
- Base class for all employees  
- Properties:
  - name
  - salary  
- Method:
  - calculateSalary() → returns base salary  

---

### 2. FullTimeEmployee Class
- Inherits from Employee  
- Overrides calculateSalary()  
- Adds bonus of 5000 to base salary  

---

### 3. PartTimeEmployee Class
- Inherits from Employee  
- Uses base salary without changes  

---

## How It Works

1. User enters:
   - Employee type (Full/Part)  
   - Name  
   - Base salary  

2. Based on type:
   - Full → creates FullTimeEmployee object  
   - Part → creates PartTimeEmployee object  

3. Salary is calculated:
   - Full-time → salary + 5000  
   - Part-time → salary  

4. Final salary is displayed  

---

## How to Run
```bash
php EmployeeSalarySystem.php