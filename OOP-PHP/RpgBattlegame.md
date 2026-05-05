# RpgBattleGame

## Description
This program is a CLI-based RPG Battle Game built using PHP OOP.  
The player chooses a character, battles an enemy, and the game continues until one character loses all health.

---

## Concepts Used
- Classes and Objects
- Constructors
- Inheritance
- Method Overriding
- Encapsulation
- Polymorphism
- Game Loop
- CLI Input Handling

---

## Key Components

### 1. Character Class
- Base class for all characters
- Stores:
  - name
  - health
  - attackPower
- Contains common methods:
  - attack()
  - takeDamage()
  - isAlive()
  - getName()

---

### 2. Warrior Class
- Inherits from Character
- Has:
  - 120 health
  - 25 attack power

---

### 3. Mage Class
- Inherits from Character
- Has:
  - 90 health
  - 20 attack power
- Overrides attack()
- Uses Fireball with extra damage

---

### 4. Enemy Class
- Inherits from Character
- Represents the Goblin enemy
- Has:
  - 100 health
  - 15 attack power

---

### 5. Game Class
- Controls the full game flow
- Handles:
  - player name input
  - character selection
  - enemy creation
  - battle loop
  - win/loss result

---

## How It Works

1. User enters player name
2. User chooses character:
   - Warrior
   - Mage

3. Enemy is created:
   - Goblin

4. Battle starts:
   - Player attacks enemy
   - Enemy attacks player
   - Loop continues while both are alive

5. Game ends when:
   - enemy health becomes 0
   - or player health becomes 0

6. Winner is displayed

---

## How to Run
```bash
php RpgBattleGame.php