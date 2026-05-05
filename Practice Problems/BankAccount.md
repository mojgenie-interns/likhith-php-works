# BankAccountOperations

## Description
This program demonstrates a simple Bank Account system using PHP OOP.  
It allows depositing money, withdrawing money, and checking the account balance.

---

## Concepts Used
- Classes and Objects
- Constructors
- Methods
- Conditional Statements
- Encapsulation

---

## Key Components

### 1. BankAccount Class
- Properties:
  - accountHolder
  - balance  

- Constructor:
  - Initializes account holder name and balance  

---

### 2. Method: deposit()
- Adds money to balance  
- Validates amount (> 0)  

---

### 3. Method: withdraw()
- Deducts money from balance  
- Validates amount (> 0)  

---

### 4. Method: checkBalance()
- Displays current balance  

---

## How It Works

1. Create a BankAccount object:
   - Name: Likhith  
   - Balance: 20000  

2. Perform operations:
   - Deposit 50000  
   - Withdraw 2000  

3. Display final balance  

---

## How to Run
```bash
php BankAccountOperations.php