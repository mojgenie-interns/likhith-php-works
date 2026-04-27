<?php

class Character
{
    protected $name;
    protected $health;
    protected $attackPower;

    public function __construct($name, $health, $attackPower)
    {
        $this->name = $name;
        $this->health = $health;
        $this->attackPower = $attackPower;
    }

    public function attack($enemy)
    {
        echo $this->name . " attacks " . $enemy->getName() . " for " . $this->attackPower . " damage\n";
        $enemy->takeDamage($this->attackPower);
    }

    public function takeDamage($damage)
    {
        $this->health -= $damage;

        if ($this->health < 0) {
            $this->health = 0;
        }

        echo $this->name . " health: " . $this->health . "\n\n";
    }

    public function isAlive()
    {
        return $this->health > 0;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Warrior extends Character
{
    public function __construct($name)
    {
        parent::__construct($name, 120, 25);
    }
}

class Mage extends Character
{
    public function __construct($name)
    {
        parent::__construct($name, 90, 20);
    }
    public function attack($enemy)
    {
        $magicDamage = $this->attackPower + 10;

        echo $this->name . " casts Fireball on " . $enemy->getName() . " for " . $magicDamage . " damage\n";
        $enemy->takeDamage($magicDamage);
    }
}

class Enemy extends Character
{
    public function __construct($name)
    {
        parent::__construct($name, 100, 15);
    }
}

class Game
{
    private $player;
    private $enemy;

    public function start()
    {
        echo "===== RPG Battle Game =====\n\n";
        $name = readline("Enter your name: ");

        echo "\nChoose your character:\n";
        echo "1. Warrior\n";
        echo "2. Mage\n";

        $choice = readline("Enter choice: ");
        if ($choice == 1) {
            $this->player = new Warrior($name);
        } elseif ($choice == 2) {
            $this->player = new Mage($name);
        } else {
            echo "Invalid choice! Defaulting to Warrior.\n";
            $this->player = new Warrior($name);
        }
        $this->enemy = new Enemy("Goblin");

        echo "\n🔥 Battle Started!\n\n";
        while ($this->player->isAlive() && $this->enemy->isAlive()) {

            // Player attacks
            $this->player->attack($this->enemy);

            if (!$this->enemy->isAlive()) {
                break;
            }
            $this->enemy->attack($this->player);
        }
        if ($this->player->isAlive()) {
            echo "🏆 " . $this->player->getName() . " wins!\n";
        } else {
            echo "💀 " . $this->player->getName() . " lost! Enemy wins!\n";
        }
    }
}

$game = new Game();
$game->start();

?>