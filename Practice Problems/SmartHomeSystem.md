# SmartHomeSystem

## Description
This program demonstrates a simple Smart Home System using PHP OOP.  
It manages smart devices like lights, fans, and ACs.

---

## Concepts Used
- Classes and Objects
- Abstract Classes
- Interfaces
- Inheritance
- Method Overriding
- Encapsulation
- Polymorphism
- Arrays of Objects

---

## Key Components

### 1. Interface: Controllable
- Defines common methods:
  - turnOn()
  - turnOff()

---

### 2. Abstract Class: SmartDevice
- Base class for all smart devices
- Properties:
  - name
  - status
- Implements turnOn() and turnOff()
- Forces child classes to implement showStatus()

---

### 3. SmartLight Class
- Inherits from SmartDevice
- Additional property:
  - brightness
- Displays light status and brightness

---

### 4. SmartFan Class
- Inherits from SmartDevice
- Additional property:
  - speed
- Displays fan status and speed

---

### 5. SmartAC Class
- Inherits from SmartDevice
- Additional property:
  - temperature
- Displays AC status and temperature

---

### 6. SmartHome Class
- Stores smart devices in an array
- Methods:
  - addDevice()
  - showAllDevices()

---

## How It Works

1. Create SmartHome object

2. Create smart devices:
   - SmartLight
   - SmartFan
   - SmartAC

3. Add devices to SmartHome

4. Turn devices ON or OFF

5. Display all device statuses

---

## How to Run
```bash
php SmartHomeSystem.php