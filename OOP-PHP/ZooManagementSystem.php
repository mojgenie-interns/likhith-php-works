<?php
class ZooManagementSystem
{
    private $animals = [];
    public function addAnimals()
    {
        $animal = readline("Enter animal category: ");
        $type = readline("Enter the type of the animal: ");
        $name = readline("Enter the name of the animal: ");
        $age = readline("Enter the age of the animal: ");
        $sex = readline("Enter the sex of the animal: ");
        $this->animals[] = ['animal' => $animal, 'type' => $type, 'name' => $name, 'age' => $age, 'sex' => $sex];
        echo "\n Animal added successfully \n";
    }
    public function viewAnimals()
    {
        if (empty($this->animals)) {
            echo "No animals found\n";
            return;
        }
        echo "\n--------ANIMAL LIST---------\n";
        foreach ($this->animals as $animal) {
            echo "Category: " . $animal['animal'] . "\n";
            echo "Type: " . $animal["type"] . "\n";
            echo "Name" . $animal["name"] . "\n";
            echo "Age" . $animal["age"] . "\n";
            echo "Sex: " . $animal["sex"] . "\n";
            echo "--------------------\n";
        }
    }
    public function deleteAnimals()
    {
        $name = readline("Enter the name of the animal to be deleted\n");
        foreach ($this->animals as $index => $animal) {
            if ($animal['name'] == $name) {
                unset($this->animals[$index]);
                $this->animals = array_values($this->animals);
                echo "Animal deleted successfully\n";
                return;
            }
        }
        echo "Animal not found\n";
    }
    public function run()
    {
        while (true) {
            echo "======= ZOO MANAGEMENT SYSTEM =======\n";
            echo "1.View Animals\n";
            echo "2.Add Animal\n";
            echo "3.Delete Animal\n";
            echo "4.Exit\n";
            $choice = readline("Enter your choice: ");
            if ($choice == "1") {
                $this->viewAnimals();
            } else if ($choice == "2") {
                $this->addAnimals();
            } else if ($choice == "3") {
                $this->deleteAnimals();
            } else if ($choice == "4") {
                echo "\n Exiting Program\n";
            } else {
                echo "Invalid choice..Please Try Again!!\n";
                break;
            }
        }
    }

}
$zoo = new ZooManagementSystem();
$zoo->run();
?>