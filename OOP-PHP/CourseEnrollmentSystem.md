# CourseEnrollmentSystem

## Description
This program is a CLI-based Course Enrollment System built using PHP OOP concepts.  
It allows a student to select courses, view selected courses, calculate total fees, and complete enrollment using different payment methods.

---

## Concepts Used
- Classes and Objects  
- Abstract Classes  
- Inheritance  
- Interfaces  
- Traits  
- Encapsulation  
- Polymorphism  

---

## Key Components

### 1. Trait: Logger
- Used for logging messages  
- Provides reusable logging functionality  

---

### 2. Abstract Class: Course
- Base class for all courses  
- Contains:
  - title  
  - fee  
  - duration  
- Forces child classes to implement `getCategory()`  

---

### 3. Course Types
- ProgrammingCourse  
- DesignCourse  
- MarketingCourse  

Each class defines its own category.

---

### 4. Interface: PaymentMethod
- Defines `pay()` method  
- Implemented by:
  - CashPayment  
  - CardPayment  
  - UPIPayment  

---

### 5. Student Class
- Stores student name and ID  
- Provides getter methods  

---

### 6. EnrollmentCart
- Stores selected courses  
- Prevents duplicate courses  
- Calculates total fee  
- Displays selected courses  

---

### 7. Enrollment Class
- Handles final enrollment  
- Displays summary  
- Processes payment  
- Logs completion  

---

## How It Works

1. User enters:
   - Name  
   - Student ID  

2. Available courses are displayed  

3. User selects courses:
   - Can add multiple courses  
   - Duplicate courses are prevented  

4. Cart is displayed with total fee  

5. User selects payment method:
   - Cash  
   - Card  
   - UPI  

6. Enrollment is completed with summary  

---

## How to Run
```bash
php CourseEnrollmentSystem.php