<?php
class employeeModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
    echo "<p>Employee Model</p>";
  }

  // function getAll()
  // {
  //   $data = $this->pdo->query("Select emp_id, first_name, last_name, email, gender, age FROM employees_manager")->fetchAll(PDO::FETCH_ASSOC);
  //   var_dump($data);
  //   return $data;
  // }
}