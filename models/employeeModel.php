<?php
class employeeModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
  }

  function getEmployee($id)
  {
    try {
      $data = $this->pdo->query("SELECT * FROM employees_manager WHERE emp_id=$id")->fetch(PDO::FETCH_ASSOC);
      return $data;

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }
  }

  function insert($employee)
  {
    try {
      $first_name = $employee['first_name'];
      $last_name = $employee['last_name'];
      $email = $employee['email'];
      $gender = $employee['gender'];
      $city = $employee['city'];
      $street_address = $employee['street_address'];
      $state = $employee['state'];
      $postal_code = $employee['postal_code'];
      $phone_number = $employee['phone_number'];
      $age = $employee['age'];
      $sql = "INSERT INTO employees_manager (first_name, last_name, email, gender, city, street_address, state, postal_code, phone_number, age)
              VALUES ('$first_name', '$last_name', '$email', '$gender', '$city', '$street_address', '$state', '$postal_code', '$phone_number', $age)";
      $this->pdo->query($sql);

    } catch( PDOException $e) {
      print_r('Error: ' . $e->getMessage());
    }
  }
}