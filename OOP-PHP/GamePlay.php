<?php

class Player
{
    public $name;
    public $weapon;
    public $score = 0;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function chooseWeapon()
    {
        $weapon = readline("Choose your weapon (Gun/Knife): ");
        $weapon = strtolower($weapon);

        if ($weapon === "gun" || $weapon === "knife")
        {
            $this->weapon = $weapon;
        }
        else
        {
            echo "Invalid weapon choice! Defaulting to knife!!\n";
            $this->weapon = "knife";
        }

        echo "You chose: {$this->weapon}\n";
    }

    public function addScore($points)
    {
        $this->score += $points;
    }
}

class Game
{
    public function start()
    {
        echo "Welcome to the Hunting Game!\n";
        $name = readline("Enter your name: ");
        $player = new Player($name);

        echo "\nWelcome, {$player->name}!\n";

        $this->enterForest();
        $player->chooseWeapon();
        $this->gameLoop($player);

        echo "\nGame Over, {$player->name}! Your total score: {$player->score}\n";
    }

    private function enterForest()
    {
        $choice = readline("Do you wanna enter the forest? (Y/N): ");

        if (strtoupper($choice) !== "Y")
        {
            echo "You chose not to enter :( Goodbye!!\n";
            exit;
        }

        echo "You entered the forest!! Let's begin!!\n";
    }

    private function gameLoop($player)
    {
        while (true)
        {
            $points = $this->handleEncounter($player);
            $player->addScore($points);

            $again = readline("Do you wanna continue hunting? (Y/N): ");
            if (strtoupper($again) !== "Y")
            {
                break;
            }
        }
    }

    private function handleEncounter($player)
    {
        echo "\nYou hear a sound in the forest...\n";
        $choice = readline("Check the sound? (Y/N): ");

        if (strtoupper($choice) === "Y")
        {
            return $this->deer($player);
        }
        else
        {
            return $this->tiger($player);
        }
    }

    private function deer($player)
    {
        echo "\nA graceful deer appears...\n";
        $shoot = readline("Shoot it? (Y/N): ");

        if (strtoupper($shoot) === "Y")
        {
            echo "Boom! You got the deer, {$player->name}!\n";
            return 1;
        }
        else
        {
            echo "The deer ran away.\n";
            return 0;
        }
    }

    private function tiger($player)
    {
        echo "\nA tiger appears...\n";
        $action = readline("Hide or Face? ");
        $action = strtolower($action);

        if ($action === "hide")
        {
            echo "You hid safely.\n";
            return 0;
        }
        elseif ($action === "face")
        {
            if ($player->weapon === "gun")
            {
                echo "You scared the tiger away with your gun!\n";
                return 1;
            }
            else
            {
                echo "A knife wasn't enough... you got attacked.\n";
                return 0;
            }
        }
        else
        {
            echo "You froze. The tiger attacked.\n";
            return 0;
        }
    }
}

$game = new Game();
$game->start();

?>