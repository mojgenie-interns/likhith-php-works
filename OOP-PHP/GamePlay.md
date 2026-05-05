# HuntingGame

## Description
This program is a CLI-based Hunting Game built using PHP.  
The player explores a forest, makes decisions, encounters animals, and earns points based on choices.

---

## Concepts Used
- Classes and Objects  
- Constructors  
- Encapsulation  
- Loops  
- Conditional Statements  
- User Input Handling  

---

## Key Components

### 1. Player Class
- Stores:
  - name  
  - weapon  
  - score  
- Methods:
  - chooseWeapon() → allows player to pick weapon  
  - addScore() → updates score  

---

### 2. Game Class
- Controls the entire game flow  

#### Important Methods:
- start() → initializes game and player  
- enterForest() → checks if player wants to start  
- gameLoop() → keeps game running  
- handleEncounter() → decides event  
- deer() → deer encounter  
- tiger() → tiger encounter  

---

## How It Works

1. Player enters name  
2. Chooses whether to enter forest  
3. Selects weapon:
   - Gun  
   - Knife  

4. Game loop starts:
   - Player hears a sound  
   - Chooses to check or ignore  

5. Encounters:
   - Deer → can shoot and gain points  
   - Tiger → depends on weapon and action  

6. Player continues or exits game  

7. Final score is displayed  

---

## How to Run
```bash
php HuntingGame.php