# VehicleRentalSystem

## Description
This program is a CLI-based Vehicle Rental System built using PHP OOP.  
It calculates the total rental cost based on vehicle type and number of days.

---

## Concepts Used
- Classes and Objects
- Inheritance
- Method Overriding
- Constructors
- Encapsulation
- Polymorphism
- User Input Handling (CLI)

---

## Key Components

### 1. Vehicle Class
- Base class for all vehicles  
- Properties:
  - brand
  - rentPerDay  
- Method:
  - rentCalculate() → calculates basic rent  

---

### 2. Car Class
- Inherits from Vehicle  
- Additional property:
  - seats  
- Overrides rentCalculate()  
- Adds extra charge of 1000  

---

### 3. Bike Class
- Inherits from Vehicle  
- Additional property:
  - engineCC  
- Uses normal rent calculation  

---

## How It Works

1. User enters:
   - Vehicle type (Car/Bike)  
   - Brand  
   - Rent per day  
   - Number of days  

2. Based on vehicle type:
   - Car → asks for number of seats  
   - Bike → asks for engine CC  

3. Object is created accordingly  

4. Total rent is calculated:
   - Car → (rentPerDay × days) + 1000  
   - Bike → rentPerDay × days  

5. Final rent is displayed  

---

## How to Run
```bash
php VehicleRentalSystem.php