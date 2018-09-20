<?php
require('database.php');
class Employee {
    private $id;
    private $firstName, $lastName;

    public function __construct($id, $firstName, $lastName) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) {
        $this->firstName = $value;
    }
    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) {
        $this->lastName = $value;
    }
}

class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                                     $row['firstName'], 
                                     $row['lastName']);
            $employees[] = $employee;
        }
        return $employees;
    }
}
$employees = EmployeeDB::getEmployees();

?>
<!-- added all that php code there. Created the different variables and validation, 
a catch if it's not filled in right, then it adds into the appropriate database-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invest Houses</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Invest Houses</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.html">Home</a></li>
          <li><a href="calculator.html">Calculator</a></li>
          <li><a href="faq.html">FAQ</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li class="active"><a href="email.html">Email List</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="jumbotron text-center">
  <h1>Invest Houses</h1>
  <p>We'll invest your money in a house!</p>
</div>
  <div class="container">
    <h1>Employee list!</h1>
    <ul>
        <!-- display employee in bullets -->
    <?php foreach ($employees as $employee) : ?>
        <li>
        <?php echo $employee->getID(); ?>
        <?php echo $employee->getFirstName(); ?> 
        <?php echo $employee->getLastName(); ?>
            </li>
    <?php endforeach ?>
    </ul>
  </div>
<footer class="footer">
      <div class="container">
        <span class="text-muted">Sell Houses&copy</span>
      </div>
</footer>

</body>
</html>
