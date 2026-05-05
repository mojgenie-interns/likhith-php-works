<?php

interface Controllable
{
    public function turnOn();
    public function turnOff();
}

abstract class SmartDevice implements Controllable
{
    protected $name;
    protected $status = false;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function turnOn()
    {
        $this->status = true;
        echo $this->name . " turned ON\n";
    }

    public function turnOff()
    {
        $this->status = false;
        echo $this->name . " turned OFF\n";
    }

    abstract public function showStatus();
}

class SmartLight extends SmartDevice
{
    private $brightness;

    public function __construct($name, $brightness)
    {
        parent::__construct($name);
        $this->brightness = $brightness;
    }

    public function showStatus()
    {
        echo "Light: " . $this->name . "\n";
        echo "Status: " . ($this->status ? "ON" : "OFF") . "\n";
        echo "Brightness: " . $this->brightness . "%\n";
    }
}

class SmartFan extends SmartDevice
{
    private $speed;

    public function __construct($name, $speed)
    {
        parent::__construct($name);
        $this->speed = $speed;
    }

    public function showStatus()
    {
        echo "Fan: " . $this->name . "\n";
        echo "Status: " . ($this->status ? "ON" : "OFF") . "\n";
        echo "Speed: " . $this->speed . "\n";
    }
}

class SmartAC extends SmartDevice
{
    private $temperature;

    public function __construct($name, $temperature)
    {
        parent::__construct($name);
        $this->temperature = $temperature;
    }

    public function showStatus()
    {
        echo "AC: " . $this->name . "\n";
        echo "Status: " . ($this->status ? "ON" : "OFF") . "\n";
        echo "Temperature: " . $this->temperature . "°C\n";
    }
}

class SmartHome
{
    private $devices = [];

    public function addDevice(SmartDevice $device)
    {
        $this->devices[] = $device;
        echo "Device added successfully\n";
    }

    public function showAllDevices()
    {
        echo "\n===== SMART HOME DEVICES =====\n";

        foreach ($this->devices as $device) {
            echo "-------------------------\n";
            $device->showStatus();
        }
    }
}

$home = new SmartHome();

$light = new SmartLight("Bedroom Light", 80);
$fan = new SmartFan("Living Room Fan", 3);
$ac = new SmartAC("Hall AC", 22);

$home->addDevice($light);
$home->addDevice($fan);
$home->addDevice($ac);

$light->turnOn();
$fan->turnOn();
$ac->turnOff();

$home->showAllDevices();

?>