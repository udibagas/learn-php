<?php

class Customer
{
  // properties/attributes
  public $name;
  public $email;
  public $phone;
  private $balance = 0; // default value

  // protected

  // constructor
  public function __construct($name, $email, $phone)
  {
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
  }

  // method to display customer information
  public function displayInfo()
  {
    echo "Customer Name: " . $this->name . "\n";
    echo "Email: " . $this->email . "\n";
    echo "Phone: " . $this->phone . "\n";
    echo "Balance: " . $this->balance . "\n";
  }

  public function addBalance($amount)
  {
    $this->balance += $amount;
  }
}

$budi = new Customer("Budi", "budi@mail.com", '07676765');
$budi->addBalance(1000);
// echo $budi->balance;
$budi->displayInfo();
