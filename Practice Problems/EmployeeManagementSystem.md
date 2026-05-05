# CompanyEmployeeSystem

## Description
This program demonstrates a Company Employee Management System using PHP OOP.  
It manages different types of employees and calculates their final salaries based on role-specific additions.

---

## Concepts Used
- Classes and Objects
- Inheritance
- Method Overriding
- Encapsulation
- Polymorphism
- Arrays of Objects
- User Input Handling (CLI)

---

## Key Components

### 1. Employee Class
- Base class for all employees  
- Properties:
  - name
  - baseSalary  
- Methods:
  - calculateSalary() → returns base salary  
  - showDetails() → displays employee info  

---

### 2. Manager Class
- Inherits from Employee  
- Additional property:
  - bonus  
- Overrides calculateSalary():
  - Final Salary = baseSalary + bonus  

---

### 3. Developer Class
- Inherits from Employee  
- Additional property:
  - overTimePay  
- Overrides calculateSalary():
  - Final Salary = baseSalary + overtime pay  

---

### 4. Company Class
- Stores employee objects in an array  
- Methods:
  - addEmployee() → adds employee to company  
  - showAllEmployees() → displays all employee details  

---

## How It Works

1. User enters:
   - Employee type (manager/developer)  
   - Name  
   - Base salary  

2. Based on type:
   - Manager → asks for bonus  
   - Developer → asks for overtime pay  

3. Employee object is created  

4. Employee is added to Company  

5. All employee details are displayed  

---

## How to Run
```bash
php CompanyEmployeeSystem.php