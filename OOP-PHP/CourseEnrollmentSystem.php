<?php

trait Logger
{
    public function log(string $message): void
    {
        echo "[LOG] " . $message . PHP_EOL;
    }
}

abstract class Course
{
    protected string $title;
    protected float $fee;
    protected int $duration;

    public function __construct(string $title, float $fee, int $duration)
    {
        $this->title = $title;
        $this->fee = $fee;
        $this->duration = $duration;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFee(): float
    {
        return $this->fee;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    abstract public function getCategory(): string;
}

class ProgrammingCourse extends Course
{
    public function getCategory(): string
    {
        return "Programming";
    }
}

class DesignCourse extends Course
{
    public function getCategory(): string
    {
        return "Design";
    }
}

class MarketingCourse extends Course
{
    public function getCategory(): string
    {
        return "Marketing";
    }
}

interface PaymentMethod
{
    public function pay(float $amount): void;
}

class CashPayment implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "Payment of Rs. " . $amount . " received by cash." . PHP_EOL;
    }
}

class CardPayment implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "Payment of Rs. " . $amount . " received by card." . PHP_EOL;
    }
}

class UPIPayment implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "Payment of Rs. " . $amount . " completed via UPI." . PHP_EOL;
    }
}

class Student
{
    private string $name;
    private string $id;

    public function __construct(string $name, string $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }
}

class EnrollmentCart
{
    use Logger;

    private array $courses = [];

    public function addCourse(Course $course): void
    {
        foreach ($this->courses as $existingCourse) {
            if ($existingCourse->getTitle() === $course->getTitle()) {
                echo "Course already added: " . $course->getTitle() . PHP_EOL;
                return;
            }
        }

        $this->courses[] = $course;
        $this->log("Added course: " . $course->getTitle());
    }

    public function viewCourses(): void
    {
        if (empty($this->courses)) {
            echo "No courses selected yet." . PHP_EOL;
            return;
        }

        echo PHP_EOL . "Selected Courses:" . PHP_EOL;
        foreach ($this->courses as $index => $course) {
            echo ($index + 1) . ". " .
                $course->getTitle() .
                " | Category: " . $course->getCategory() .
                " | Duration: " . $course->getDuration() . " days" .
                " | Fee: Rs. " . $course->getFee() . PHP_EOL;
        }
    }

    public function getTotalFee(): float
    {
        $total = 0;
        foreach ($this->courses as $course) {
            $total += $course->getFee();
        }
        return $total;
    }

    public function isEmpty(): bool
    {
        return empty($this->courses);
    }

    public function getCourses(): array
    {
        return $this->courses;
    }
}

class Enrollment
{
    use Logger;

    private Student $student;
    private EnrollmentCart $cart;

    public function __construct(Student $student, EnrollmentCart $cart)
    {
        $this->student = $student;
        $this->cart = $cart;
    }

    public function placeEnrollment(PaymentMethod $payment): void
    {
        if ($this->cart->isEmpty()) {
            echo "Cannot place enrollment. No courses selected." . PHP_EOL;
            return;
        }

        $total = $this->cart->getTotalFee();

        echo PHP_EOL . "===== ENROLLMENT SUMMARY =====" . PHP_EOL;
        echo "Student Name: " . $this->student->getName() . PHP_EOL;
        echo "Student ID: " . $this->student->getId() . PHP_EOL;

        $this->cart->viewCourses();

        echo "Total Fee: Rs. " . $total . PHP_EOL;
        $payment->pay($total);
        $this->log("Enrollment completed for " . $this->student->getName());
    }
}

function getInput(string $message): string
{
    return trim(readline($message));
}

$courses = [
    1 => new ProgrammingCourse("PHP Backend Development", 5000, 30),
    2 => new DesignCourse("UI Design Basics", 3500, 20),
    3 => new MarketingCourse("Digital Marketing Fundamentals", 4000, 25),
    4 => new ProgrammingCourse("Java OOP Mastery", 4500, 28)
];

echo "===== COURSE ENROLLMENT SYSTEM =====" . PHP_EOL;

$name = "";
while ($name === "") {
    $name = getInput("Enter student name: ");
    if ($name === "") {
        echo "Name cannot be empty." . PHP_EOL;
    }
}

$id = "";
while ($id === "") {
    $id = getInput("Enter student ID: ");
    if ($id === "") {
        echo "Student ID cannot be empty." . PHP_EOL;
    }
}

$student = new Student($name, $id);
$cart = new EnrollmentCart();

do {
    echo PHP_EOL . "Available Courses:" . PHP_EOL;
    foreach ($courses as $key => $course) {
        echo $key . ". " .
            $course->getTitle() .
            " | " . $course->getCategory() .
            " | " . $course->getDuration() . " days" .
            " | Rs. " . $course->getFee() . PHP_EOL;
    }

    $choice = getInput("Enter course number to add (or 0 to finish): ");

    if (!is_numeric($choice)) {
        echo "Invalid input. Enter a number." . PHP_EOL;
        continue;
    }

    $choice = (int)$choice;

    if ($choice === 0) {
        break;
    }

    if (!isset($courses[$choice])) {
        echo "Invalid course choice." . PHP_EOL;
        continue;
    }

    $cart->addCourse($courses[$choice]);

} while (true);

echo PHP_EOL;
$cart->viewCourses();
echo "Total Fee: Rs. " . $cart->getTotalFee() . PHP_EOL;

if ($cart->isEmpty()) {
    echo "No enrollment done. Exiting program." . PHP_EOL;
    exit;
}

echo PHP_EOL . "Select Payment Method:" . PHP_EOL;
echo "1. Cash" . PHP_EOL;
echo "2. Card" . PHP_EOL;
echo "3. UPI" . PHP_EOL;

$payment = null;

while ($payment === null) {
    $paymentChoice = getInput("Enter payment choice: ");

    switch ($paymentChoice) {
        case "1":
            $payment = new CashPayment();
            break;
        case "2":
            $payment = new CardPayment();
            break;
        case "3":
            $payment = new UPIPayment();
            break;
        default:
            echo "Invalid payment choice." . PHP_EOL;
    }
}

$enrollment = new Enrollment($student, $cart);
$enrollment->placeEnrollment($payment);