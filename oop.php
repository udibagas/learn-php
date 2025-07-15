<?php

// aturan penulisan nama class
// nama class diawali dengan huruf kapital
// nama class menggunakan PascalCase
// singular
class Person
{
  static $availableGenders = ['Male', 'Female'];

  // properties/attributes
  public $name;

  public $dateOfBith;

  public $gender;

  // constructor
  // special method that is called when an object is created
  public function __construct($nama, $tanggalLahir, $jenisKelamin)
  {
    $this->name = $nama;
    $this->dateOfBith = $tanggalLahir;
    $this->gender = $jenisKelamin;
    echo "A new person object has been created.\n";
  }

  // instance methods/functions
  function eat()
  {
    echo "Eating...";
  }

  static function eatStatic()
  {
    echo "Eating...";
  }
}

// static called from class
print_r(Person::$availableGenders);


// $person  = new Person("Jane Doe", '1990-10-10', 'Male'); // instantiation
$person = new Person(nama: "Jane Doe", tanggalLahir: '1990-10-10', jenisKelamin: 'Male');
$person->name = "John Doe"; // dynamic property assignment
// $person->name = "John Doe";
// $person->dateOfBith = "1990-01-01";
// $person->gender = 'Male';


print_r($person);

// $person->eat();
Person::eatStatic();


// 4 characteristics of OOP
// 1. Encapsulation : means that the properties and methods of a class are bundled together, and access to them can be controlled using visibility keywords (public, private, protected).
//   - public: accessible from anywhere
//   - private: accessible only within the class itself
//   - protected: accessible within the class and its subclasses  
// 2. Abstraction: means hiding the complex implementation details and showing only the essential features of an object. In PHP, this can be achieved using abstract classes and interfaces.
//   - abstract class: a class that cannot be instantiated and may contain abstract methods (methods without implementation) that must be implemented by subclasses.
//   - interface: a contract that defines methods that must be implemented by any class that implements the interface.  
// 3. Inheritance: means that a class can inherit properties and methods from another class, allowing for code reuse and the creation of a hierarchy of classes. In PHP, this is done using the `extends` keyword. 
//   - parent class: the class being inherited from
//   - child class: the class that inherits from the parent class
// 4. Polymorphism: means that objects of different classes can be treated as objects of a common superclass. In PHP, this can be achieved through method overriding and interfaces.
//   - method overriding: a child class can provide a specific implementation of a method that is already defined in its parent class.
//   - interface: allows different classes to implement the same set of methods, enabling polymorphic behavior.