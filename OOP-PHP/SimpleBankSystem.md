# BankAccountSystem

## Description
This program is a CLI-based Bank Account System built using PHP.  
It allows a user to deposit money, withdraw money, and view account balance through a menu-driven interface.

---

## Concepts Used
- Classes and Objects
- Methods
- Loops
- Conditional Statements
- User Input Handling (CLI)

---

## Key Components

### 1. BankAccount Class
- Properties:
  - name
  - balance  

- Methods:
  - Deposit() → adds money to balance  
  - Withdraw() → subtracts money from balance  
  - showBalance() → displays current balance  

---

## How It Works

1. User enters:
   - Name  
   - Initial balance  

2. Program shows menu:
   - Deposit  
   - Withdraw  
   - View Balance  
   - Exit  

3. Based on user choice:
   - Deposit → balance increases  
   - Withdraw → balance decreases  
   - View → shows balance  

4. Loop continues until user exits  

---

## How to Run
```bash
php BankAccountSystem.php